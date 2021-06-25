<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        if ($profile = Session::get('profile', null)) {
            return Inertia::render('Auth/Register', ['profile' => $profile]);
        }

        return Redirect::route('login');
    }

    public function store()
    {
        return Request::all();
    }
}
