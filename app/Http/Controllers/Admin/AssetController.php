<?php

namespace App\Http\Controllers\Admin;

use App\Models\Asset;

use App\Models\Asset_Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateAssetRequest;
use App\Models\User;

class AssetController extends Controller
{
    public function index() {
        $as_A = Asset::where('id_tipe',1)->get();
        $as_B = Asset::where('id_tipe',2)->get();
        $as_C = Asset::where('id_tipe',3)->get();
        $tipe = Asset_Type::get();
        $karyawan = User::where('level','karyawan')->get();
        // dd($karyawan);
        return view('admin.asset.index',compact('as_A','as_B','as_C','tipe','karyawan'));
    }

    public function destroy(Asset $item) {
        $item->delete();
        session()->flash('Berhasil', 'Asset Nomor '. $item->no_asset. ' Berhasil DiHapus');
        return back();
    }

    public function edit(Request $request) {
        $data = Asset::where('plat_nomor',$request->data)->get();
        return $data;
    }

    public function update(Request $request) {
        $id = $request->id;
        $asset = Asset::where('id',$id)->get();
        $asset[0]->update($request->all());
        session()->flash('Berhasil', 'Data Asset '. $id .' Berhasil DiUpdate');
        return back();
    }

    public function create(Request $request) {
        $input = $request->all();
        // dd($input);
        Asset::create($input);
        session()->flash('Berhasil', 'Asset Berhasil Ditambahkan');
        return back();
        
    }
}
