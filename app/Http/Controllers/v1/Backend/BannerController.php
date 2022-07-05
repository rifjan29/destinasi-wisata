<?php

namespace App\Http\Controllers\v1\Backend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Exception;
use Illuminate\Support\Facades\File;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->param['parentMenu'] = 'Dashboard';
        $this->param['current'] = 'Dashboard';
        $this->param['route'] = 'backoffice';
    }

    public function index()
    {
        $this->param['pageTitle'] = 'Semua Data';
        $this->param['routeList'] = 'banner.index';
        $this->param['data'] = Banner::all();

        return view('backend.banner.index',$this->param);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->param['pageTitle'] = 'Tambah Data';
        $this->param['routeList'] = 'banner.index';
        return view('backend.banner.create',$this->param);
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
            'subtitle' => 'required',
            'keterangan' => 'required',
            'foto' => 'required',
        ]);
        try {
            $photos = $request->file('foto');
            $filename = date('His') . '.' . $photos->getClientOriginalExtension();
            $path = public_path('img/banner');

            $add = new Banner;

            $add->title = $request->get('judul');
            $add->subtitle = $request->get('subtitle');
            $add->keterangan = $request->get('keterangan');
            $add->status = $request->get('lang');
            if ($photos->move($path, $filename)) {
                $add->banner = $filename;
            }else{
                return redirect()->back()->withError('Terjadi kesalahan.');
            }
            $add->save();
            return redirect()->route('banner.index')->withStatus('Berhasil menyimpan data.');
        } catch (Exception $e) {
            return redirect()->back()->withError('Terjadi kesalahan.');
        } catch (QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan.');
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->param['pageTitle'] = 'Tambah Data';
        $this->param['routeList'] = 'banner.index';
        $this->param['data'] = Banner::find($id);
        return view('backend.banner.edit',$this->param);
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
            'subtitle' => 'required',
            'keterangan' => 'required',
        ]);
        try {
            $path = public_path('img/banner');

            $update = Banner::find($id);

            $update->title = $request->get('judul');
            $update->subtitle = $request->get('subtitle');
            $update->keterangan = $request->get('keterangan');
            $update->status = $request->get('lang');
            if ($request->file('foto') != null) {
                $photos = $request->file('foto');
                $filename = date('His') . '.' . $photos->getClientOriginalExtension();
                $path_current = public_path() . '/img/banner/';
                $file_old = $path_current . $update->banner;
                if (unlink($file_old)) {
                    if ($photos->move($path, $filename)) {
                        $update->banner = $filename;
                    }else{
                        return redirect()->back()->withError('Terjadi kesalahan.');
                    }
                }

            }
            $update->update();
            return redirect()->route('banner.index')->withStatus('Berhasil menyimpan data.');
        } catch (Exception $e) {
            return $e;
            return redirect()->back()->withError('Terjadi kesalahan.');
        } catch (QueryException $e) {
            return $e;
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
            $delete = Banner::find($id);
            $img_path = public_path().'/img/banner/'.$delete->banner;
            if (File::delete($img_path)) {
                $delete->delete();
            }
            return redirect()->route('banner.index')->withStatus('Berhasil Menghapus Data');
        } catch (Exception $e) {
            return redirect()->back()->withError('Terdapat Kesalahan', $e);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terdapat Kesalahan', $e);
        }
    }
}
