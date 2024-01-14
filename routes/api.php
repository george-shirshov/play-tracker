<?php

use App\Http\Controllers\SaveResultController;
use App\Http\Controllers\TopController;
use Illuminate\Support\Facades\Route;

Route::post('/save-result', SaveResultController::class)->name('save-result');
Route::post('/top', TopController::class)->name('top');
