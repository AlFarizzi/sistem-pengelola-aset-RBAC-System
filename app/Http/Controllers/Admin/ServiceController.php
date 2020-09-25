<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\ServiceAcc;
use App\Mail\ServiceReject;
use Illuminate\Support\Facades\Mail;

class ServiceController extends Controller
{
    public function index() {
        $confir = Service::where('id_status', "1")->get();
        $b_confir = Service::where('id_status', "2")->get();
        return view('admin.service.index', compact('confir','b_confir'));
    }


    public function confirm(Service $b_conf) {
        // dd($b_conf->user->email);
        // Mail::to($b_conf->user->email)->send(new ServiceAcc());
        // dd($b_conf);
        $b_conf->update([
            "id_status" => 1,
        ]);
        session()->flash('Berhasil', 'Permintaan Service '.$b_conf->asset->no_asset. ' Telah Diterima');
        return back();
    }

    public function reject(Service $b_conf) {
        // Mail::to('malfarizzi13@gmail.com')->send(new ServiceReject());
        $b_conf->delete();
        session()->flash('Berhasil', 'Permintaab Service Asset '.$b_conf->asset->no_asset. ' Telah Ditolak');
        return back();   
    }

}
