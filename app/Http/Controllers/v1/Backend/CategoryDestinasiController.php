<?php

namespace App\Http\Controllers\v1\Backend;

use App\Http\Controllers\Controller;
use App\Models\KategoriDestinasi;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryDestinasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $param;

    public function __construct()
    {
        $this->param['parentMenu'] = 'Dashboard';
        $this->param['current'] = 'Dashboard';
        $this->param['route'] = 'backoffice';
    }

    public function index()
    {
        $this->param['pageTitle'] = 'Semua Data';
        $this->param['routeList'] = 'category-destinasi.index';
        $this->param['data'] = KategoriDestinasi::all();
        return view('backend.category-destination.index',$this->param);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->param['pageTitle'] = 'Tambah Data';
        $this->param['routeList'] = 'category-destinasi.index';
        return view('backend.category-destination.create',$this->param);
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
            $this->param['routeList'] = 'category-destinasi.index';
            $slug = Str::slug($request->get('nama'));
            $add = new KategoriDestinasi;
            $add->name = $request->get('nama');
            $add->slug = $slug;
            $add->keterangan = $request->get('keterangan');
            $add->status = $request->get('lang');
            $add->save();
            return redirect()->route('category-destinasi.index')->withStatus('Berhasil menyimpan data.');
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
        $this->param['routeList'] = 'category-destinasi.index';
        $this->param['data'] = KategoriDestinasi::find($id);
        return view('backend.category-destination.edit',$this->param);
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
            $this->param['routeList'] = 'category-destinasi.index';
            $slug = Str::slug($request->get('nama'));
            $update = KategoriDestinasi::findOrFail($id);
            $update->name = $request->get('nama');
            $update->slug = $slug;
            $update->keterangan = $request->get('keterangan');
            $update->status = $request->get('lang');
            $update->save();
            return redirect()->route('category-destinasi.index')->withStatus('Berhasil mengganti data.');
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
            $delete = KategoriDestinasi::findOrFail($id);
            $delete->delete();
            return redirect()->route('category-destinasi.index')->withStatus('Berhasil Menghapus Data');
        } catch (Exception $e) {
            return redirect()->back()->withError('Terdapat Kesalahan', $e);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terdapat Kesalahan', $e);
        }
    }
}
