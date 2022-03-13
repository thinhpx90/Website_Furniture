<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserService implements UserServiceInterface
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function create($params)
    {
        // dd($params);
        $params['password'] = Hash::make($params['password']);
        return $this->user->create($params);
    }
}
