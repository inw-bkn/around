<?php

namespace App\Http\Controllers;

use App\Contracts\AuthenticationAPI;
use App\Models\User;
use Illuminate\Support\Facades\Request;

class AvatarUsersController extends Controller
{
    public function store(AuthenticationAPI $api)
    {
        if (Request::header('token') !== config('auth.avatars.token')) {
            abort(403);
        }

        $authUser = $api->authenticate(Request::input('login'), Request::input('password'));
        $user = User::whereLogin(Request::input('login'))->first();

        if (! ($authUser['found'] && $user)) {
            return [
                'found' => false,
            ];
        }

        return [
            'found' => true,
            'login' => $user->login,
            'name' => $user->name,
            'profile' => $user->profile,
            'avatar_token' => $user->avatar_token,
        ];
    }

    public function show()
    {
        return [
            'found' => true,
            'login' => Request::user()->login,
            'name' => Request::user()->name,
            'home_apge' => Request::user()->home_apge,
            'profile' => Request::user()->profile,
        ];
    }
}
