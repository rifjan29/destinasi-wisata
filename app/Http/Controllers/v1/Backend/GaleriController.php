<?php

namespace App\Http\Controllers\v1\Backend;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GaleriController extends Controller
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
        $this->param['routeList'] = 'galeri.index';
        $this->param['data'] = Galeri::all();
        return view('backend.galeri.index',$this->param);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->param['pageTitle'] = 'Tambah Data';
        $this->param['routeList'] = 'galeri.index';
        return view('backend.galeri.create',$this->param);
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
            'foto' => 'required',
            'lang' => 'required',

        ]);
        try {
            $photos = $request->file('foto');
            $filename = date('His') . '.' . $photos->getClientOriginalExtension();
            $path = public_path('img/galeri');

            $add = new Galeri;

            $add->title = $request->get('judul');

            $add->status = $request->get('lang');
            if ($photos->move($path, $filename)) {
                $add->photos = $filename;
            }else{
                return redirect()->back()->withError('Terjadi kesalahan.');
            }
            $add->save();
            return redirect()->route('galeri.index')->withStatus('Berhasil menyimpan data.');
        } catch (Exception $e) {
            return redirect()->route('galeri.index')->withError('Terjadi kesalahan.');
        } catch (QueryException $e) {
            return redirect()->route('galeri.index')->withError('Terjadi kesalahan.');
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
        $this->param['data'] = Galeri::find($id);
        return view('backend.galeri.edit',$this->param);
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
            'lang' => 'required',

        ]);

        try {

            $path = public_path('img/galeri');

            $update = Galeri::find($id);
            $update->title = $request->get('judul');
            $update->status = $request->get('lang');
            if ($request->file('foto') != null) {
                $photos = $request->file('foto');
                $filename = date('His') . '.' . $photos->getClientOriginalExtension();
                $path_current = public_path() . '/img/galeri/';
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
            return redirect()->route('galeri.index')->withStatus('Berhasil mengganti data.');
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
            $delete = Galeri::find($id);
            $img_path = public_path().'/img/galeri/'.$delete->photos;
            if (File::delete($img_path)) {
                $delete->delete();
            }
            return redirect()->route('galeri.index')->withStatus('Berhasil Menghapus Data');
        } catch (Exception $e) {
            return redirect()->back()->withError('Terdapat Kesalahan', $e);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terdapat Kesalahan', $e);
        }
    }
}
