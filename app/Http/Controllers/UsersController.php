<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class UsersController extends Controller
{
    public function preferences()
    {
        return Inertia::render('Users/Preferences');
    }
}
