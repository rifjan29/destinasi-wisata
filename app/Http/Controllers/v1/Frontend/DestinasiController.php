<?php

namespace App\Http\Controllers\v1\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Destinasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class DestinasiController extends Controller
{
    public function index()
    {
        $locale = App::currentLocale();
        $data = Destinasi::select('destinasi.*','kategori_destinasi.id as id_kategori_destinasi','kategori_destinasi.name','kategori_destinasi.slug as slug_kategori_destinasi','kategori_destinasi.keterangan')
                            ->join('kategori_destinasi','destinasi.kategori_destinasi_id','kategori_destinasi.id')
                            ->where('destinasi.status',$locale)
                            ->orderBy('destinasi.id','DESC')
                            ->get();
        return view('pages.destinasi.index',compact('data'));
    }

    public function detail($slug)
    {
        $locale = App::currentLocale();
        $data = Destinasi::select('destinasi.*','kategori_destinasi.id as id_kategori_destinasi','kategori_destinasi.name','kategori_destinasi.slug as slug_kategori_destinasi','kategori_destinasi.keterangan')
                            ->join('kategori_destinasi','destinasi.kategori_destinasi_id','kategori_destinasi.id')
                            ->where('destinasi.slug',$slug)
                            ->where('destinasi.status',$locale)
                            ->orderBy('destinasi.id','DESC')
                            ->first();
        return view('pages.destinasi.detail',compact('data'));
    }
}
