<?php

namespace App\Http\Controllers\v1\Backend;

use App\Http\Controllers\Controller;
use App\Models\Destinasi;
use App\Models\Event;
use App\Models\Feedback;
use App\Models\PetaWisata;
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
        $this->param['countEvents'] = Event::count();
        $this->param['countDestinasi'] = Destinasi::count();
        $this->param['countMaps'] = PetaWisata::count();
        $this->param['countFeedback'] = Feedback::count();
        return view('dashboard',$this->param);
    }
}
