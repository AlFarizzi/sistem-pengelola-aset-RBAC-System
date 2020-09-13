<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function index() {
        $confir = Service::where('status', 'Konfirmasi')->get();
        $b_confir = Service::where('status', 'Belum Konfirmasi')->get();
        return view('admin.service.index', compact('confir','b_confir'));
    }


    public function confirm(Service $conf) {
        $conf->update([
            "status" => "Konfirmasi",
        ]);
        session()->flash('Berhasil', 'Permintaan Service '.$conf->asset->no_asset. ' Telah Diterima');
        return back();
    }

    public function reject(Service $conf) {
        $conf->delete();
        session()->flash('Berhasil', 'Permintaab Service Asset '.$conf->asset->no_asset. ' Telah Ditolak');
        return back();   
    }

}
