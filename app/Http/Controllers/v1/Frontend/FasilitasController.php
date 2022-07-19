<?php

namespace App\Http\Controllers\v1\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class FasilitasController extends Controller
{
    public function index()
    {
        $locale = App::currentLocale();
        $data = Fasilitas::where('status',$locale)->get();
        return view('pages.fasilitas.index',compact('data'));
    }
}
