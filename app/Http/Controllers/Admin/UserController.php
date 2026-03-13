<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();

        return view('admin.users.index',compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {

        User::create([

            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>$request->role,
            'status'=>'active'

        ]);

        return redirect('/admin/users')->with('success','Đã tạo user');

    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.edit',compact('user'));
    }

    public function update(Request $request,$id)
    {

        $user = User::findOrFail($id);

        $user->update([

            'role'=>$request->role,
            'status'=>$request->status

        ]);

        return redirect()->back()->with('success','Đã cập nhật');

    }

    public function destroy($id)
    {

        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->back();

    }

}