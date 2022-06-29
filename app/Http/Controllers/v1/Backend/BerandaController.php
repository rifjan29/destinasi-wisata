<?php

namespace App\Http\Controllers\v1\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public $param;

    public function __construct()
    {
        $this->param['parentMenu'] = 'Backoffice';
        $this->param['current'] = 'Dashboard';
        $this->param['route'] = 'backoffice';
    }
    public function index()
    {
        $this->param['pageTitle'] = 'Dashboard';
        return view('dashboard',$this->param);
    }
}
