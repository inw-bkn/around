<?php

use App\Http\Controllers\Procedures\AcuteHemodialysis\CaseRecordsController as AcuteHemodialysisCasesController;
use App\Http\Controllers\Procedures\AcuteHemodialysis\OrdersController;
use App\Http\Controllers\ProceduresController;
use Illuminate\Support\Facades\Route;

// procedures
Route::get('procedures', ProceduresController::class)
     ->middleware('auth')
     ->name('procedures');

// Acute HD
Route::middleware('auth')
     ->prefix('procedures/acute-hemodialysis')
     ->name('procedures.acute-hemodialysis.')
     ->group(function () {
         Route::get('/', [AcuteHemodialysisCasesController::class, 'index'])
               ->name('index');
         Route::post('/', [AcuteHemodialysisCasesController::class, 'store'])
               ->name('store');
         Route::get('/{slug}/edit', [AcuteHemodialysisCasesController::class, 'edit'])
               ->name('edit');
         Route::patch('/{slug}', [AcuteHemodialysisCasesController::class, 'update'])
               ->name('update');
         Route::post('/orders', [OrdersController::class, 'store'])
               ->name('orders.store');
         Route::get('/orders/{slug}/edit', [OrdersController::class, 'edit'])
               ->name('orders.edit');
         Route::patch('/orders/{slug}', [OrdersController::class, 'update'])
               ->name('orders.update');
     });
