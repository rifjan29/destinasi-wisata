<?php

namespace App\Http\Controllers\v1\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class EventController extends Controller
{
    public function index()
    {
        $locale = App::currentLocale();
        $data = Event::select('event.*','kategori_event.id as id_kategori_event','kategori_event.name','kategori_event.slug as slug_kategori_event','kategori_event.keterangan')
                            ->join('kategori_event','event.kategori_event_id','kategori_event.id')
                            ->where('event.status',$locale)
                            ->orderBy('event.id','DESC')
                            ->get();
        return view('pages.event.index',compact('data'));
    }
    public function detail($slug)
    {
        $locale = App::currentLocale();
        $data = Event::select('event.*','kategori_event.id as id_kategori_event','kategori_event.name','kategori_event.slug as slug_kategori_event','kategori_event.keterangan')
                            ->join('kategori_event','event.kategori_event_id','kategori_event.id')
                            ->where('event.slug',$slug)
                            ->where('event.status',$locale)
                            ->orderBy('event.id','DESC')
                            ->first();
        return view('pages.event.detail',compact('data'));
    }
}
