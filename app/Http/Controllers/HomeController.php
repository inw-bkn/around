<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function __invoke()
    {
        Request::session()->flash('page-title', 'Home');
        Request::session()->flash('main-menu-links', [
            ['icon' => 'patient', 'label' => 'Patients', 'route' => 'patients', 'can' => true],
            ['icon' => 'clinic', 'label' => 'Clinics', 'route' => 'clinics', 'can' => true],
            ['icon' => 'procedure', 'label' => 'Procedures', 'route' => 'procedures', 'can' => true],
            ['icon' => 'graduation-cap', 'label' => 'Kidney club', 'route' => 'kidney-club', 'can' => true],
            // ['icon' => 'graduation-cap', 'label' => 'Club Nephro', 'route' => 'procedures', 'can' => true],
            // ['icon' => 'box', 'label' => 'Code Drive', 'route' => 'procedures', 'can' => true],
        ]);

        return Inertia::render('Users/Home');
    }
}
