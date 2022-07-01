<?php

namespace App\Http\Controllers\v1\Backend;

use App\Http\Controllers\Controller;
use App\Models\CategoryEvent;
use App\Models\Event;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->param['parentMenu'] = 'Dashboard';
        $this->param['current'] = 'Dashboard';
        $this->param['route'] = 'backoffice';
    }

    public function index()
    {
        $this->param['pageTitle'] = 'Semua Data';
        $this->param['routeList'] = 'events.index';
        $this->param['data'] = Event::select('event.*','kategori_event.*')
                                    ->join('kategori_event','kategori_event.id','event.kategori_event_id')
                                    ->get();

        return view('backend.event.index',$this->param);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->param['pageTitle'] = 'Tambah Data';
        $this->param['routeList'] = 'events.index';
        $this->param['data'] = CategoryEvent::select('id','name')->get();
        return view('backend.event.create',$this->param);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'kategori_event' => 'required',
            'waktu' => 'required',
            'lang' => 'required',
        ]);
        try {
            $slug = Str::slug($request->get('judul'));
            $photos = $request->file('foto');
            $filename = date('His') . '.' . $photos->getClientOriginalExtension();
            $path = public_path('img/events');

            $add = new Event;

            $add->kategori_event_id = $request->get('kategori_event');
            $add->title = $request->get('judul');
            $add->slug = $slug;
            $add->deskripsi = $request->get('deskripsi');
            $add->waktu = $request->get('waktu');
            $add->status = $request->get('lang');
            if ($photos->move($path, $filename)) {
                $add->photos = $filename;
            }else{
                return redirect()->back('events.create')->withError('Terjadi kesalahan.');
            }
            $add->save();
            return redirect()->route('events.index')->withStatus('Berhasil menyimpan data.');
        } catch (Exception $e) {
            return redirect()->back()->withError('Terjadi kesalahan.');
        } catch (QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
