<?php

namespace App\Http\Controllers\v1\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class GaleriController extends Controller
{
    public function index()
    {
        $locale = App::currentLocale();
        $data = Galeri::where('status',$locale)
                            ->get();
        return view('pages.galeri.index',compact('data'));
    }
}
