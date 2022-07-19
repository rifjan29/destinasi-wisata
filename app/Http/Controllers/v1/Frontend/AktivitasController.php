<?php

namespace App\Http\Controllers\v1\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Aktivitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class AktivitasController extends Controller
{
    public function index()
    {
        $locale = App::currentLocale();
        $data = Aktivitas::where('status',$locale)->get();
        return view('pages.aktivitas.index',compact('data'));
    }
}
