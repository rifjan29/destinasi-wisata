<?php

namespace App\Http\Controllers\v1\Backend;

use App\Http\Controllers\Controller;
use App\Models\Destinasi;
use App\Models\KategoriDestinasi;
use App\Models\Provinsi;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;
use Exception;
use Illuminate\Database\QueryException;

class DestinasiController extends Controller
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
        $this->param['routeList'] = 'destinasi.index';
        $this->param['data'] = Destinasi::select('destinasi.*',
                                            'ro_province.province_id','ro_province.province',
                                            'ro_subdistrict.subdistrict_id','ro_subdistrict.type','ro_subdistrict.subdistrict_name',
                                            'ro_city.city_id','ro_city.city_name')
                                        ->join('ro_province','ro_province.province_id','destinasi.provinsi_id')
                                        ->join('ro_city','ro_city.city_id','destinasi.kab_id')
                                        ->join('ro_subdistrict','ro_subdistrict.subdistrict_id','destinasi.kec_id')
                                        ->get();

        return view('backend.destinasi.index',$this->param);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->param['pageTitle'] = 'Tambah Data';
        $this->param['routeList'] = 'destinasi.index';
        $this->param['data'] = KategoriDestinasi::select('id','name')->get();
        $this->param['provinsi'] = Provinsi::select('province_id','province')->get();
        return view('backend.destinasi.create',$this->param);
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
            'id_provinsi' => 'required|not_in:0',
            'id_kabupaten' => 'required|not_in:0',
            'id_kecamatan' => 'required|not_in:0',
            'alamat' => 'required',
            'kategori_destinasi' => 'required|not_in:0',
            'lang' => 'required',
        ]);
        try {
            $slug = Str::slug($request->get('judul'));
            $photos = $request->file('foto');
            $filename = date('His') . '.' . $photos->getClientOriginalExtension();
            $path = public_path('img/destinasi');

            $add = new Destinasi;

            $add->kategori_destinasi_id = $request->get('kategori_destinasi');
            $add->title = $request->get('judul');
            $add->slug = $slug;
            $add->deskripsi = $request->get('deskripsi');
            $add->provinsi_id = $request->get('id_provinsi');
            $add->kab_id = $request->get('id_kabupaten');
            $add->kec_id = $request->get('id_kecamatan');
            $add->alamat = $request->get('alamat');
            $add->status = $request->get('lang');
            if ($photos->move($path, $filename)) {
                $add->photos = $filename;
            }else{
                return redirect()->back()->withError('Terjadi kesalahan.');
            }
            $add->save();
            return redirect()->route('destinasi.index')->withStatus('Berhasil menyimpan data.');
        } catch (Exception $e) {
            return $e;
            return redirect()->back()->withError('Terjadi kesalahan.');
        } catch (QueryException $e) {
            return $e;
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
        $this->param['pageTitle'] = 'Tambah Data';
        $this->param['routeList'] = 'destinasi.index';
        $this->param['data_kategori'] = KategoriDestinasi::select('id','name')->get();
        $this->param['provinsi'] = Provinsi::select('province_id','province')->get();
        $this->param['data'] = Destinasi::select('destinasi.*',
                                    'ro_province.province_id','ro_province.province',
                                    'ro_subdistrict.subdistrict_id','ro_subdistrict.type','ro_subdistrict.subdistrict_name',
                                    'ro_city.city_id','ro_city.city_name')
                                ->join('ro_province','ro_province.province_id','destinasi.provinsi_id')
                                ->join('ro_city','ro_city.city_id','destinasi.kab_id')
                                ->join('ro_subdistrict','ro_subdistrict.subdistrict_id','destinasi.kec_id')
                                ->where('destinasi.id',$id)
                                ->first();
        return view('backend.destinasi.edit',$this->param);
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
            'id_provinsi' => 'required|not_in:0',
            // 'id_kabupaten' => 'required|not_in:0',
            // 'id_kecamatan' => 'required|not_in:0',
            'alamat' => 'required',
            'kategori_destinasi' => 'required|not_in:0',
            'lang' => 'required',
        ]);
        try {
            $slug = Str::slug($request->get('judul'));

            $path = public_path('img/destinasi');

            $update = Destinasi::findOrFail($id);

            $update->kategori_destinasi_id = $request->get('kategori_destinasi');
            $update->title = $request->get('judul');
            $update->slug = $slug;
            $update->deskripsi = $request->get('deskripsi');
            $update->provinsi_id = $request->get('id_provinsi');
            if ($request->get('id_kabupaten') && $request->get('id_kecamatan')) {
                $update->kab_id = $request->get('id_kabupaten');
                $update->kec_id = $request->get('id_kecamatan');
            }
            $update->alamat = $request->get('alamat');
            $update->status = $request->get('lang');
            if ($request->file('foto') != null) {
                $photos = $request->file('foto');
                $filename = date('His') . '.' . $photos->getClientOriginalExtension();
                $path_current = public_path() . '/img/destinasi/';
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
            return redirect()->route('destinasi.index')->withStatus('Berhasil menyimpan data.');
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
            $delete = Destinasi::find($id);
            $img_path = public_path().'/img/destinasi/'.$delete->photos;
            if (File::delete($img_path)) {
                $delete->delete();
            }
            return redirect()->route('destinasi.index')->withStatus('Berhasil Menghapus Data');
        } catch (Exception $e) {
            return redirect()->back()->withError('Terdapat Kesalahan', $e);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terdapat Kesalahan', $e);
        }
    }

    public function getKabupaten(Request $request)
    {
        $idProvinsi = $request->provinsiId;
        $kabupaten = DB::table('ro_city')->where('province_id',$idProvinsi)
                    ->select('city_id as id','city_name as name','type')
                    ->get();
        echo "<option value='' id='0/0'>Masukkan Keyword Kota/Kabupaten</option>";
        foreach ($kabupaten as $data) {
            echo "<option value='$data->id'>$data->type $data->name</option>";
        }
        // return response()->json($kabupaten);
    }

    public function getKecamatan(Request $request)
    {
        $idKabupaten = $request->kabupatenId;
        $kecamatan = DB::table('ro_subdistrict')->where('city_id',$idKabupaten)
                                        ->pluck('subdistrict_id as id','subdistrict_name as name');
        return response()->json($kecamatan);
    }
}
