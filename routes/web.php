<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Auth
Route::get('login', [AuthenticatedSessionController::class, 'create'])
     ->middleware('guest')
     ->name('login');
Route::post('login', [AuthenticatedSessionController::class, 'store'])
     ->middleware('guest')
     ->name('login.store');
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

// user
Route::get('/', [UsersController::class, 'home'])
     ->middleware('auth')
     ->name('home');
Route::get('preferences', [UsersController::class, 'preferences'])
     ->middleware('auth')
     ->name('preferences');
Route::post('/check-timeout', [UsersController::class, 'checkTimeout'])
     ->name('check-timeout');

// Route::get('/', DashboardController::class)
//      ->middleware('auth')
//      ->name('home');

Route::get('/prototypes/{page}', function ($page) {
    switch ($page) {
        case 'AcuteHDReservation':
            $title = 'Acute HD Order / Mr. Ronald Duck';
            break;

        default:
            $title = $page;
            break;
    }

    request()->session()->flash('page-title', $title);

    return Inertia::render('Prototypes/'.$page);
});

// Route::get('/preferences', function () {
//     return Redirect::to('/prototypes/Preferences');
// });

Route::post('/admissions', function () {
    sleep(2);
    $gender = rand() >= 7.5 ? 'male' : 'female';
    $faker = Faker\Factory::create();

    return [
        'hn' => ((int) request()->an) - 7777777,
        'name' => ($gender == 'female' ? $faker->firstNameFemale : $faker->firstNameMale).' '.$faker->lastName,
        'gender' => $gender,
        'age' => $faker->numberBetween(20, 100).' Yo',
    ];
});
