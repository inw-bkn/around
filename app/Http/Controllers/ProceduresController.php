<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class ProceduresController extends Controller
{
    public function __invoke()
    {
        Request::session()->flash('page-title', 'Home');
        Request::session()->flash('main-menu-links', [
            ['icon' => 'patient', 'label' => 'Patients', 'route' => 'patients', 'can' => true],
            ['icon' => 'clinic', 'label' => 'Clinics', 'route' => 'clinics', 'can' => true],
            ['icon' => 'procedure', 'label' => 'Procedures', 'route' => 'procedures', 'can' => true],
        ]);

        // check if there is one then redirect

        return Inertia::render('Procedures/Index');
    }
}
