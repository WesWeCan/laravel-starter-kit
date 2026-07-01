<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\ShowcaseController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, 'index'])->name('index');

Route::prefix('showcase')->name('showcase.')->group(function () {
    Route::get('/', [ShowcaseController::class, 'index'])->name('index');
    Route::post('/contact', [ShowcaseController::class, 'storeContact'])->name('contact.store');
    Route::post('/registration', [ShowcaseController::class, 'storeRegistration'])->name('registration.store');
    Route::put('/profile', [ShowcaseController::class, 'updateProfile'])->name('profile.update');
    Route::post('/upload', [ShowcaseController::class, 'storeUpload'])->name('upload.store');
});
