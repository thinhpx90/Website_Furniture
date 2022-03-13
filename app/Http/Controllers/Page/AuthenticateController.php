<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\UserServiceInterface;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class AuthenticateController extends Controller
{
    protected $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function Login(LoginRequest $request)
    {
        $remember = isset($request['remember']) ? true : false;
        if (Auth::attempt($request->only(['email','password']), $remember)) {
            return redirect()->back();
        } else {
            return redirect()->back()->with('status', 'tài khoản hoặc mật khẩu không chính xác!');
        }
    }

    public function register(RegisterRequest $request)
    {
        try {
            $this->userService->create($request->all());
            Auth::attempt($request->only(['email','password']));
            return redirect()->back();
        } catch (Exception $ex) {
            dd($ex);
        }
    }
}
