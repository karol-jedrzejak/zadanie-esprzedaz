<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;


Route::get('/', [PetsController::class, 'welcome']);

// Pets
Route::resource('pets', PetsController::class)->except([
    'index'
]);

// Pets by status
Route::post('petsbystatus', [PetsController::class, 'status'])->name('petsbystatus');
