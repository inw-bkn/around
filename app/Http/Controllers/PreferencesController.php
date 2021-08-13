<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class PreferencesController extends Controller
{
    public function __invoke()
    {
        return Inertia::render('Users/Preferences');
    }
}
