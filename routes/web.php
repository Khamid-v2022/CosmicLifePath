<?php

use App\Http\Controllers\CosmicFlowController;
use Illuminate\Support\Facades\Route;

Route::controller(CosmicFlowController::class)->group(function (): void {
    Route::get('/', 'landing')->name('landing');
    Route::get('/step-2/{sign}', 'birthdate')->name('birthdate');
    Route::post('/step-2', 'storeBirthDetails')->name('birth.details.submit');
    Route::get('/final-step', 'contact')->name('reading.contact');
    Route::post('/final-step', 'storeContact')->name('reading.contact.submit');
    Route::get('/generating-reading', 'loading')->name('reading.loading');
    Route::post('/generating-reading', 'loading');
    Route::get('/your-reading', 'summary')->name('reading.summary');
    Route::post('/your-reading', 'summary');
    Route::get('/special-offer', 'sales')->name('sales.page');
    Route::post('/special-offer', 'sales');
});
