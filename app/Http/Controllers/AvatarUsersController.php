<?php

namespace App\Http\Controllers;

use App\Contracts\AuthenticationAPI;
use App\Models\User;
use Illuminate\Support\Facades\Request;

class AvatarUsersController extends Controller
{
    public function __invoke(AuthenticationAPI $api)
    {
        if (Request::header('token') !== config('auth.avatars.token')) {
            abort(403);
        }

        $authUser = $api->authenticate(Request::input('login'), Request::input('password'));

        if (! $authUser['found']) {
            return $authUser;
        }

        if ($user = User::whereLogin(Request::input('login'))->first()) {
            return [
                'login' => $user->login,
                'name' => $user->name,
                'profile' => $user->profile,
                'avatar_token' => $user->avatar_token,
            ];
        }

        return [
            'found' => false,
        ];
    }
}
