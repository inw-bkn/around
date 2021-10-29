<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PreferencesController;
use App\Http\Controllers\Resources\APIs\AcuteHemodialysisSlotAvailableController;
use App\Http\Controllers\Resources\APIs\AdmissionsController;
use App\Http\Controllers\Resources\APIs\PatientRecentlyAdmissionController;
use App\Http\Controllers\Resources\APIs\WardsController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Auth
Route::get('login', [AuthenticatedSessionController::class, 'create'])
     ->middleware('guest')
     ->name('login');
Route::post('login', [AuthenticatedSessionController::class, 'store'])
     ->middleware('guest')
     ->name('login.store');
Route::post('check-timeout', [AuthenticatedSessionController::class, 'update'])
     ->name('check-timeout');
Route::delete('logout', [AuthenticatedSessionController::class, 'destroy'])
     ->middleware('auth')
     ->name('logout');

// Register
Route::get('register', [RegisteredUserController::class, 'create'])
     ->middleware('guest')
     ->name('register');
Route::post('register', [RegisteredUserController::class, 'store'])
     ->middleware('guest')
     ->name('register.store');

// pages
Route::get('terms-and-policies', [PagesController::class, 'terms'])
     ->name('terms');

// home
Route::get('/', HomeController::class)
     ->middleware('auth')
     ->name('home');
Route::get('preferences', PreferencesController::class)
     ->middleware('auth')
     ->name('preferences');

// resurces
Route::middleware('auth')->name('resources.api.')->group(function () {
    Route::get('admissions/{an}', AdmissionsController::class)
         ->name('admissions.show');
    Route::get('patient-recently-admission/{hn}', PatientRecentlyAdmissionController::class)
         ->name('patient-recently-admission.show');
    Route::get('wards', WardsController::class)
         ->name('wards');
    Route::get('acute-hemodialysis-slot-available/{dateNote}', AcuteHemodialysisSlotAvailableController::class)
         ->name('acute-hemodialysis-slot-available');
});

// patients
Route::get('patients', function () {
    return 'patients';
})->middleware('auth')->name('patients');

Route::get('clinics', function () {
    return 'clinics';
})->middleware('auth')->name('clinics');

require __DIR__.'/procedures.php';

// Route::get('/prototypes/{page}', function ($page) {
//     switch ($page) {
//         case 'AcuteHDReservation':
//             $title = 'Acute HD Order / Mr. Ronald Duck';
//             break;

//         default:
//             $title = $page;
//             break;
//     }

//     request()->session()->flash('page-title', $title);

//     return Inertia::render('Prototypes/'.$page);
// });
