<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class UsersController extends Controller
{
    public function home()
    {
        return Inertia::render('Users/Home');
    }

    public function preferences()
    {
        return Inertia::render('Users/Preferences');
    }

    public function checkTimeout()
    {
        return ['active' => true];
    }
}
