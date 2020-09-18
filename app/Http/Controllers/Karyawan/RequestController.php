<?php

namespace App\Http\Controllers\Karyawan;

use App\Models\Asset;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\serviceRequest;
use App\Http\Requests\sparepartRequest;
use App\Models\Sparepart;

class RequestController extends Controller
{
    public function index() {
        return view('karyawan.dashboard');
    }

    public function serviceRequest() {
        $assets = Asset::where('id_user',Auth::user()->id)->get();
        // dd($assets);
        return view('karyawan.service.service',compact('assets'));
    }

    public function sparepartRequest() {
        return view('karyawan.sparepart.sparepart');
    }

    public function serviceRequestSend(serviceRequest $request) {
        $input = $request->all();
        $input['id_user'] = Auth::user()->id;
        $input['id_status'] = 2;
        $input['uuid'] = 'SRV-'.\Str::random(5);
        // dd($input);
        session()->flash('Berhasil', 'Permintaan Service Berhasil Dikirim');
        Service::create($input);
        return back();
    }

    public function listServiceRequest() {
        $r_services = Service::where("id_status", 2)->where('id_user', Auth::user()->id)->latest()->get();
        return view('karyawan.service.list',compact('r_services'));
    }

    public function serviceRequestCancel(Service $item) {
        $item->delete();
        session()->flash('Berhasil', 'Permintaan Service Telah Dibatalkan');
        return back();
    }

    public function sparepartRequestSend(sparepartRequest $request) {
        $input = $request->all();
        $input['status'] = 2;
        $input['id_user'] = Auth::user()->id;
        $input['total'] = $input['harga'] * $input['jumlah'];

        Sparepart::create($input);
        session()->flash('Berhasil', 'Permintaan Sparepart Berhasil Dikirimkan');
        return back();
    }

    public function listSparepartRequest() {
        $spareparts = Sparepart::where('id_user',Auth::user()->id)->where('status',2)->get();
        return view('karyawan.sparepart.list',compact('spareparts'));
    }

    public function sparepartRequestCancel(Sparepart $item) {
        $item->delete();
        session()->flash('Berhasil', 'Permintaan Sparepart Berhasil Dibatalkan');
        return back();
    }

}
