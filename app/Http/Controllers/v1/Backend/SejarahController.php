<?php

namespace App\Http\Controllers\v1\Backend;

use App\Http\Controllers\Controller;
use App\Models\Sejarah;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;


class SejarahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->param['parentMenu'] = 'Dashboard';
        $this->param['current'] = 'Dashboard';
        $this->param['route'] = 'backoffice';
    }
    public function index()
    {
        $this->param['pageTitle'] = 'Semua Data';
        $this->param['routeList'] = 'sejarah.index';
        $this->param['data'] = Sejarah::all();
        return view('backend.sejarah.index',$this->param);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->param['pageTitle'] = 'Tambah Data';
        $this->param['routeList'] = 'sejarah.index';
        return view('backend.sejarah.create',$this->param);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required',
            'lang' => 'required',

        ]);
        try {
            $photos = $request->file('foto');
            $filename = date('His') . '.' . $photos->getClientOriginalExtension();
            $path = public_path('img/sejarah');

            $add = new Sejarah;

            $add->title = $request->get('judul');
            $add->deskripsi = $request->get('deskripsi');

            $add->status = $request->get('lang');
            if ($photos->move($path, $filename)) {
                $add->photos = $filename;
            }else{
                return redirect()->back()->withError('Terjadi kesalahan.');
            }
            $add->save();
            return redirect()->route('sejarah.index')->withStatus('Berhasil menyimpan data.');
        } catch (Exception $e) {
            return $e;
            return redirect()->route('sejarah.index')->withError('Terjadi kesalahan.');
        } catch (QueryException $e) {
            return $e;
            return redirect()->route('sejarah.index')->withError('Terjadi kesalahan.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->param['pageTitle'] = 'Edit Data';
        $this->param['routeList'] = 'sejarah.index';
        $this->param['data'] = Sejarah::find($id);
        return view('backend.sejarah.edit',$this->param);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'lang' => 'required',

        ]);

        try {

            $path = public_path('img/sejarah');

            $update = Sejarah::find($id);
            $update->title = $request->get('judul');
            $update->deskripsi = $request->get('deskripsi');
            $update->status = $request->get('lang');
            if ($request->file('foto') != null) {
                $photos = $request->file('foto');
                $filename = date('His') . '.' . $photos->getClientOriginalExtension();
                $path_current = public_path() . '/img/sejarah/';
                $file_old = $path_current . $update->photos;
                if (unlink($file_old)) {
                    if ($photos->move($path, $filename)) {
                        $update->photos = $filename;
                    }else{

                        return redirect()->back()->withError('Terjadi kesalahan.');
                    }
                }

            }
            $update->update();
            return redirect()->route('sejarah.index')->withStatus('Berhasil mengganti data.');
        } catch (Exception $e) {
            return redirect()->back()->withError('Terjadi kesalahan.');
        } catch (QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $delete = Sejarah::find($id);
            $img_path = public_path().'/img/sejarah/'.$delete->photos;
            if (File::delete($img_path)) {
                $delete->delete();
            }
            return redirect()->route('sejarah.index')->withStatus('Berhasil Menghapus Data');
        } catch (Exception $e) {
            return redirect()->back()->withError('Terdapat Kesalahan', $e);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terdapat Kesalahan', $e);
        }
    }
}
