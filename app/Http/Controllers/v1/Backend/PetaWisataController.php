<?php

namespace App\Http\Controllers\v1\Backend;

use App\Http\Controllers\Controller;
use App\Models\KategoriMaps;
use App\Models\PetaWisata;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PetaWisataController extends Controller
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
        $this->param['routeList'] = 'peta-wisata.index';
        $this->param['data'] = PetaWisata::select('maps.*','kategori_maps.id as id_kategori_maps','kategori_maps.name')
                                    ->join('kategori_maps','kategori_maps.id','maps.kategori_maps_id')
                                    ->get();

        return view('backend.peta-wisata.index',$this->param);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->param['pageTitle'] = 'Tambah Data';
        $this->param['routeList'] = 'peta-wisata.index';
        $this->param['data'] = KategoriMaps::select('id','name')->get();
        return view('backend.peta-wisata.create',$this->param);
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
            'kategori_maps' => 'required|not_in:0',
            'maps' => 'required',
            'lang' => 'required',
            'title' => 'required'
        ]);
        try {
            $slug = Str::slug($request->get('title'));
            $add = new PetaWisata;
            $add->kategori_maps_id = $request->get('kategori_maps');
            $add->title = $request->get('title');
            $add->slug = $slug;
            $add->peta_maps = $request->get('maps');
            $add->keterangan = $request->get('keterangan') != null ? $request->get('keterangan') : '-';
            $add->status = $request->get('lang');
            $add->save();
            return redirect()->route('peta-wisata.index')->withStatus('Berhasil menambahkan data.');
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
        $this->param['pageTitle'] = 'Detail Data';
        $this->param['routeList'] = 'peta-wisata.index';
        $this->param['data'] = PetaWisata::select('maps.*','kategori_maps.id as id_kategori_maps','kategori_maps.name')
                                    ->join('kategori_maps','kategori_maps.id','maps.kategori_maps_id')
                                    ->where('maps.id',$id)
                                    ->first();
        return view('backend.peta-wisata.detail',$this->param);
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
        $this->param['routeList'] = 'peta-wisata.index';
        $this->param['data'] = PetaWisata::find($id);
        $this->param['data_kategori'] = KategoriMaps::select('id','name')->get();
        return view('backend.peta-wisata.edit',$this->param);
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
            'kategori_maps' => 'required|not_in:0',
            'lang' => 'required',
        ]);
        try {
            $slug = Str::slug($request->get('title'));

            $update = PetaWisata::find($id);
            $update->kategori_maps_id = $request->get('kategori_maps');
            if ($request->get('maps') != null && $request->get('maps') != ''){
                $update->peta_maps = $request->get('maps');
            }
            $update->title = $request->get('title');
            $update->slug = $slug;
            $update->keterangan = $request->get('keterangan') != null ? $request->get('keterangan') : '-';
            $update->status = $request->get('lang');
            $update->save();
            return redirect()->route('peta-wisata.index')->withStatus('Berhasil mengganti data.');
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
            $delete = PetaWisata::find($id);
            $delete->delete();
            return redirect()->route('peta-wisata.index')->withStatus('Berhasil Menghapus Data');
        } catch (Exception $e) {
            return redirect()->back()->withError('Terdapat Kesalahan', $e);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terdapat Kesalahan', $e);
        }
    }
}
