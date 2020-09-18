<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\CreateUserRequest;

class UserController extends Controller
{
    public function index() {
        $users = User::latest()->get(['username','nama','email']);
        return view('admin.user.index',compact('users'));
    }

    public function delete(User $user) {
        $user->delete();
        session()->flash('Berhasil', 'Data '.$user->username.' Berhasil Di Hapus');
        return back();
    }

    public function edit(User $user) {
        $path = explode('/',request()->path());
        return view('admin.user.edit',compact('user','path'));
    }

    public function update(EditUserRequest $request, User $user) {
        $user->update($request->all());
        session()->flash('Berhasil', 'Data Berhasi Data');
        return redirect()->route('user.edit',$user);
    }

    public function view(User $user) {
        $path = explode('/',request()->path());
        return view('admin.user.view',compact('user','path'));
    }

    public function create(CreateUserRequest $request) {
        $input = $request->all();
        // dd($input);
        $input['password'] = bcrypt($request->password);
        $user = User::create($input);
        $user->assignRole($input['level']);
        session()->flash('Berhasil', 'Data Berhasil Di Tambahkan');
        return back();
    }
}
