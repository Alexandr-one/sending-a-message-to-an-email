<?php
use Illuminate\Support\Facades\Route;

    Route::get('/',[\App\Http\Controllers\MainController::class, 'index']);
    Route::get('send',[\App\Http\Controllers\MainController::class,'send'])->name('send');
