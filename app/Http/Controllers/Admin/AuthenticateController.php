<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function checkLogin(Request $request)
    {
        $remember = isset($request['remember']) ? true : false;
        if (Auth::attempt($request->only(['email','password']), $remember)) {
            return redirect()->route('admin.index');
        } else {
            return redirect()->back()->with('status', 'tài khoản hoặc mật khẩu không chính xác!');
        }
    }
}
