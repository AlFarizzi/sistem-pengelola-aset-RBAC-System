<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Sparepart;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class LaporanConrtoller extends Controller
{
    public function serviceView() {
        return view('admin.laporan.service');
    }

    public function sparepartView() {
        return view('admin.laporan.sparepart');
    }

    public function sparepartPrint(Request $request) {
        $sp = Sparepart::where('status', $request->status)->get();
        $pdf = PDF::loadView('admin.laporan.sparepartPrint', compact('sp'));
        return $pdf->download('sparepart.pdf');
        // return view('admin.laporan.sparepartPrint',compact('sp'));
    }

    public function servicePrint(Request $request) {
        $sp = Service::where('status', $request->status)->get()->all();
        // dd($sp[0]->asset->nama);
        // dd($sp);
        $pdf = PDF::loadView('admin.laporan.servicePrint', compact('sp'));
        return $pdf->download('service.pdf');
        // return view('admin.laporan.servicePrint',compact('sp'));
    }


}
