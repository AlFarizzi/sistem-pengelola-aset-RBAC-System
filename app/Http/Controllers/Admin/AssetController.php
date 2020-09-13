<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Asset;
use Illuminate\Http\Request;
use App\Http\Requests\CreateAssetRequest;

class AssetController extends Controller
{
    public function index() {
        $as_A = Asset::where('id_tipe',1)->get();
        $as_B = Asset::where('id_tipe',2)->get();
        $as_C = Asset::where('id_tipe',3)->get();
        return view('admin.asset.index',compact('as_A','as_B','as_C'));
    }

    public function destroy(Asset $item) {
        $item->delete();
        session()->flash('Berhasil', 'Asset Nomor '. $item->no_asset. ' Berhasil DiHapus');
        return back();
    }

    public function edit(Request $request) {
        $data = Asset::where('no_asset',$request->no_asset)->get();
        return $data;
    }

    public function update(Request $request) {
        $id = $request->no_asset;
        $asset = Asset::where('no_asset',$id)->get();
        $asset[0]->update($request->all());
        session()->flash('Berhasil', 'Data Asset '. $id .' Berhasil DiUpdate');
        return back();
    }

    public function create(CreateAssetRequest $request) {
        $input = $request->all();
        $input['satuan'] = 'unit';
        $input['no_asset'] = "ASSET - " . \Str::random(5);
        // dd($input);
        Asset::create($input);
        session()->flash('Berhasil', 'Data Berhasil Masuk');
        return back();
    }
}
