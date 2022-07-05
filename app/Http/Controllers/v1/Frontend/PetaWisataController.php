<?php

namespace App\Http\Controllers\v1\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Destinasi;
use App\Models\PetaWisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PetaWisataController extends Controller
{
    public function index()
    {
        $locale = App::currentLocale();
        $data = PetaWisata::select('maps.*','kategori_maps.id as id_kategori_maps','kategori_maps.name','kategori_maps.slug as slug_kategori_maps','kategori_maps.keterangan')
                            ->join('kategori_maps','maps.kategori_maps_id','kategori_maps.id')
                            ->where('maps.status',$locale)
                            ->orderBy('maps.id','DESC')
                            ->first();
        return view('pages.peta-wisata.index',compact('data'));
    }
}
