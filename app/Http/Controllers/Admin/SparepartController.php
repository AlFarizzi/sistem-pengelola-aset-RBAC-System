<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Sparepart;
use Illuminate\Http\Request;
use App\Http\Requests\CreateSparepartRequest;

class SparepartController extends Controller
{
    public function index() {
        $confir = Sparepart::where('status', 'Konfirmasi')->latest()->get();
        $b_confir = Sparepart::where("status", "Belum Konfirmasi")->latest()->get();
        return view('admin.sparepart.index',compact('confir', 'b_confir'));
    }

    public function create(CreateSparepartRequest $request) {
        $input = $request->all();
        Sparepart::create($input);
        session()->flash('Berhasil', 'Data Sparepart Berhasil Ditambahkan, Menunggu Konfirmasi');
        return back();
    }

    public function reject(Sparepart $conf) {
        $conf->delete();
        session()->flash('Berhasil', 'Permintaan Sparepart Telah Ditolak');
        return back();
    }

    public function confirm(Sparepart $conf) {
        $conf->update([
            "status" => "Konfirmasi"
        ]);
        session()->flash('Berhasil', 'Permintaan Sparepart Telah DiKonfirmasi');
        return back();
    }

}
