<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\User;
use App\Models\Sparepart;
use Illuminate\Http\Request;

class AdminDashboard extends Controller
{
    public function index() {
        $sp = count(Sparepart::get()->all());
        $usr = count(User::get()->all());
        $aset = count(Asset::get()->all());
        return view('admin.dashboard', compact('sp','usr','aset'));
    }
}
