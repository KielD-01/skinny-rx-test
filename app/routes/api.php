<?php

use App\Http\Controllers\Api\SubmissionController;
use Illuminate\Support\Facades\Route;

Route::post('submissions', [SubmissionController::class, 'store'])->name('store');
