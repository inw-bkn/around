<?php

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome');
});

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

Route::get('/home', function () {
    return Redirect::to('/prototypes/Home');
});

Route::post('/logout', function () {
    return Redirect::to('/');
});

Route::get('/preferences', function () {
    return Redirect::to('/prototypes/Preferences');
});

Route::post('/session-timeout', function () {
    return ['active' => true];
});

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
