<?php

namespace App\Http\Controllers\v1\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $param;

    public function __construct()
    {


    }

    public function index()
    {
        return view('welcome');
    }
}
