<?php

namespace App\Http\Controllers\v1\Backend;

use App\Http\Controllers\Controller;
use App\Models\KategoriMaps;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CategoryMapsController extends Controller
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
        $this->param['routeList'] = 'category-maps.index';
        $this->param['data'] = KategoriMaps::all();

        return view('backend.category-maps.index',$this->param);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->param['pageTitle'] = 'Tambah Data';
        $this->param['routeList'] = 'category-maps.index';

        return view('backend.category-maps.create',$this->param);
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
            'nama' => 'required',
            'lang' => 'required',
        ]);
        try {
            $this->param['pageTitle'] = 'Tambah Data';
            $this->param['routeList'] = 'category-events.index';
            $slug = Str::slug($request->get('nama'));
            $add = new KategoriMaps;
            $add->name = $request->get('nama');
            $add->slug = $slug;
            $add->keterangan = $request->get('keterangan');
            $add->status = $request->get('lang');
            $add->save();
            return redirect()->route('category-maps.index')->withStatus('Berhasil menyimpan data.');
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
        $this->param['routeList'] = 'category-maps.index';
        $this->param['data'] = KategoriMaps::find($id);
        return view('backend.category-maps.edit',$this->param);
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
            'nama' => 'required',
            'lang' => 'required',
        ]);
        try {
            $this->param['pageTitle'] = 'Tambah Data';
            $this->param['routeList'] = 'category-events.index';
            $slug = Str::slug($request->get('nama'));
            $update = KategoriMaps::findOrFail($id);
            $update->name = $request->get('nama');
            $update->slug = $slug;
            $update->keterangan = $request->get('keterangan');
            $update->status = $request->get('lang');
            $update->save();
            return redirect()->route('category-maps.index')->withStatus('Berhasil mengganti data.');
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
            $delete = KategoriMaps::findOrFail($id);
            $delete->delete();
            return redirect()->route('category-maps.index')->withStatus('Berhasil Menghapus Data');
        } catch (Exception $e) {
            return redirect()->back()->withError('Terdapat Kesalahan', $e);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terdapat Kesalahan', $e);
        }
    }
}
