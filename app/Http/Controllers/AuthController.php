<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{

    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {

    $user = User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>Hash::make($request->password),
        'role'=>'user'
    ]);

    Auth::login($user);

    return redirect('/');

    }

   public function login(Request $request)
    {

        if(Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password
        ])){

            $user = Auth::user();

            // kiểm tra nếu tài khoản bị khóa
            if($user->status == 'locked'){

                Auth::logout();

                return back()->with('error','Tài khoản đã bị khóa. Vui lòng liên hệ admin.');

            }

            return redirect()->intended('/');

        }

        return back()->with('error','Sai email hoặc mật khẩu');

    }

    public function logout()
    {

        Auth::logout();

        return redirect('/');

    }

}
