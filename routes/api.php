<?php

use App\Http\Controllers\Gateway\EventController;
use App\Http\Controllers\Gateway\ShowController;
use Illuminate\Support\Facades\Route;

Route::prefix('shows')->controller(ShowController::class)->group(function () {
    Route::get('/', 'index')->name('shows.index');
    Route::get('/{id}', 'show')->where('id', '\d+')->name('shows.show');
});

Route::prefix('events')->controller(EventController::class)->group(function () {
    Route::get('/{id}', 'show')->where('id', '\d+')->name('events.places');
    Route::post('/{id}/reserve', 'reserve')->where('id', '\d+')->name('events.reserve');
});
