<?php

namespace App\Http\Controllers\Karyawan;

use App\Models\Asset;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\serviceRequest;

class RequestController extends Controller
{
    public function index() {
        return view('karyawan.dashboard');
    }

    public function serviceRequest() {
        $assets = Asset::latest()->get();
        return view('karyawan.service.service',compact('assets'));
    }

    public function sparepartRequest() {
    }

    public function serviceRequestSend(serviceRequest $request) {
        $input = $request->all();
        $input['id_user'] = Auth::user()->id;
        $input['status'] = 'Belum Konfirmasi';
        session()->flash('Berhasil', 'Permintaan Service Berhasil Dikirim');
        Service::create($input);
        return back();
    }

    public function listServiceRequest() {
        $r_services = Service::where("status", 'Belum Konfirmasi')->where('id_user', Auth::user()->id)->latest()->get();
        return view('karyawan.service.list',compact('r_services'));
    }

    public function serviceRequestCancel(Service $item) {
        $item->delete();
        session()->flash('Berhasil', 'Permintaan Service Telah Dibatalkan');
        return back();
    }

}
