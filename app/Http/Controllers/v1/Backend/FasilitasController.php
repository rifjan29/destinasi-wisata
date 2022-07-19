<?php

namespace App\Http\Controllers\v1\Backend;

use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Exception;
use Illuminate\Database\QueryException;

class FasilitasController extends Controller
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
        $this->param['routeList'] = 'fasilitas.index';
        $this->param['data'] = Fasilitas::all();
        return view('backend.fasilitas.index',$this->param);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->param['pageTitle'] = 'Tambah Data';
        $this->param['routeList'] = 'fasilitas.index';
        return view('backend.fasilitas.create',$this->param);
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
            $slug = Str::slug($request->get('judul'));
            $photos = $request->file('foto');
            $filename = date('His') . '.' . $photos->getClientOriginalExtension();
            $path = public_path('img/fasilitas');

            $add = new Fasilitas;

            $add->title = $request->get('judul');
            $add->slug = $slug;
            $add->deskripsi = $request->get('deskripsi');

            $add->status = $request->get('lang');
            if ($photos->move($path, $filename)) {
                $add->photos = $filename;
            }else{
                return redirect()->back()->withError('Terjadi kesalahan.');
            }
            $add->save();
            return redirect()->route('fasilitas.index')->withStatus('Berhasil menyimpan data.');
        } catch (Exception $e) {
            return redirect()->route('fasilitas.index')->withError('Terjadi kesalahan.');
        } catch (QueryException $e) {
            return redirect()->route('fasilitas.index')->withError('Terjadi kesalahan.');
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
        $this->param['routeList'] = 'fasilitas.index';
        $this->param['data'] = Fasilitas::find($id);
        return view('backend.fasilitas.edit',$this->param);
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
            $slug = Str::slug($request->get('judul'));

            $path = public_path('img/fasilitas');

            $update = Fasilitas::find($id);
            $update->title = $request->get('judul');
            $update->slug = $slug;
            $update->deskripsi = $request->get('deskripsi');
            $update->status = $request->get('lang');
            if ($request->file('foto') != null) {
                $photos = $request->file('foto');
                $filename = date('His') . '.' . $photos->getClientOriginalExtension();
                $path_current = public_path() . '/img/fasilitas/';
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
            return redirect()->route('fasilitas.index')->withStatus('Berhasil mengganti data.');
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
            $delete = Fasilitas::find($id);
            $img_path = public_path().'/img/fasilitas/'.$delete->photos;
            if (File::delete($img_path)) {
                $delete->delete();
            }
            return redirect()->route('fasilitas.index')->withStatus('Berhasil Menghapus Data');
        } catch (Exception $e) {
            return redirect()->back()->withError('Terdapat Kesalahan', $e);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terdapat Kesalahan', $e);
        }
    }
}
