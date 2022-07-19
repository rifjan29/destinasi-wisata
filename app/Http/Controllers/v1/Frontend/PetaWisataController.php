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
        $data = PetaWisata::where('maps.status',$locale)
                            ->first();
        return view('pages.peta-wisata.index',compact('data'));
    }
}
