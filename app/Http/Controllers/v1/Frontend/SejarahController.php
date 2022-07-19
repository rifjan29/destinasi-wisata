<?php

namespace App\Http\Controllers\v1\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Sejarah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SejarahController extends Controller
{
    public function index()
    {
        $locale = App::currentLocale();
        $data = Sejarah::where('status',$locale)->first();
        return view('pages.sejarah.index',compact('data'));
    }
}
