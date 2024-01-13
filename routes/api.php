<?php

use App\Http\Controllers\SaveResultController;
use Illuminate\Support\Facades\Route;

Route::post('/save-result', SaveResultController::class)->name('save-result');
