<?php

namespace App\Http\Controllers\v1\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Destinasi;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    public $param;

    public function __construct()
    {


    }

    public function index()
    {
        $locale = App::currentLocale();
        $data_banner = Banner::where('status',$locale)
                            ->get();
        $data_event = Event::select('event.*','kategori_event.id as id_kategori_event','kategori_event.name','kategori_event.slug as slug_kategori_event','kategori_event.keterangan')
                            ->join('kategori_event','event.kategori_event_id','kategori_event.id')
                            ->where('event.status',$locale)
                            ->orderBy('event.id','DESC')
                            ->take(3)
                            ->get();
        $data_destinasi = Destinasi::select('destinasi.*','kategori_destinasi.id as id_kategori_destinasi','kategori_destinasi.name','kategori_destinasi.slug as slug_kategori_destinasi','kategori_destinasi.keterangan')
                            ->join('kategori_destinasi','destinasi.kategori_destinasi_id','kategori_destinasi.id')
                            ->where('destinasi.status',$locale)
                            ->orderBy('destinasi.id','DESC')
                            ->take(3)
                            ->get();
        return view('welcome',compact('data_banner','data_event','data_destinasi'));
    }
}
