<?php

namespace App\Http\Controllers\v1\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Destinasi;
use App\Models\Event;
use App\Models\Galeri;
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
        $data_galeri = Galeri::where('status',$locale)->get();
        return view('welcome',compact('data_banner','data_event','data_galeri'));
    }
}
