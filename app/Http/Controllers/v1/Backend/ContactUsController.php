<?php

namespace App\Http\Controllers\v1\Backend;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Doctrine\DBAL\Query\QueryException;
use Exception;
use Illuminate\Http\Request;

class ContactUsController extends Controller
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
        $this->param['routeList'] = 'contact-us.index';
        $this->param['data'] = ContactUs::all();

        return view('backend.contact.index',$this->param);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->param['pageTitle'] = 'Tambah Data';
        $this->param['routeList'] = 'contact-us.index';

        return view('backend.contact.create',$this->param);
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
            'icon' => 'required',
        ]);
        try {
            $this->param['pageTitle'] = 'Tambah Data';
            $this->param['routeList'] = 'contact-us.index';
            $add = new ContactUs;
            $add->icon = $request->get('icon');
            $add->link = $request->get('kontak');
            // $add->status = $request->get('lang');
            $add->save();
            return redirect()->route('contact-us.index')->withStatus('Berhasil menyimpan data.');
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
        $this->param['pageTitle'] = 'Edit Data';
        $this->param['routeList'] = 'contact-us.index';
        $this->param['data'] = ContactUs::find($id);
        return view('backend.contact.edit',$this->param);
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
        $request->validate([
            'icon' => 'required',
        ]);
        try {
            $this->param['pageTitle'] = 'Tambah Data';
            $this->param['routeList'] = 'contact-us.index';
            $add = ContactUs::find($id);
            $add->icon = $request->get('icon');
            $add->link = $request->get('kontak');
            // $add->status = $request->get('lang');
            $add->update();
            return redirect()->route('contact-us.index')->withStatus('Berhasil menyimpan data.');
        } catch (Exception $e) {
            return redirect()->back()->withError('Terjadi kesalahan.');
        } catch (QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $delete = ContactUs::findOrFail($id);
            $delete->delete();
            return redirect()->route('contact-us.index')->withStatus('Berhasil Menghapus Data');
        } catch (Exception $e) {
            return redirect()->back()->withError('Terdapat Kesalahan', $e);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terdapat Kesalahan', $e);
        }
    }
}
