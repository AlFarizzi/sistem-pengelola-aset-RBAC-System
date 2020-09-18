<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sparepart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateSparepartRequest;
use App\Mail\SparepartAcc;
use App\Mail\SparepartReject;
use Illuminate\Support\Facades\Mail;

class SparepartController extends Controller
{
    public function index() {
        $confir = Sparepart::where('status', 1)->latest()->get();
        $b_confir = Sparepart::where("status", 2)->latest()->get();
        return view('admin.sparepart.index',compact('confir', 'b_confir'));
    }

    public function create(CreateSparepartRequest $request) {
        $input = $request->all();
        // dd($input);
        $input['id_user'] = Auth::user()->id;
        $input['total'] = $input['harga'] * $input['jumlah'];
        $input['status'] = 2;
        Sparepart::create($input);
        session()->flash('Berhasil', 'Data Sparepart Berhasil Ditambahkan, Menunggu Konfirmasi');
        return back();
    }

    public function reject(Sparepart $conf) {
        Mail::to($conf->user->email)->send(new SparepartReject());
        $conf->delete();
        session()->flash('Berhasil', 'Permintaan Sparepart Telah Ditolak');
        return back();
    }

    public function confirm(Sparepart $conf) {
        Mail::to($conf->user->email)->send(new SparepartAcc());
        $conf->update([
            "status" => 1
        ]);
        session()->flash('Berhasil', 'Permintaan Sparepart Telah DiKonfirmasi');
        return back();
    }

}
