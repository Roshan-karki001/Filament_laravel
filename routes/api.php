<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\User\{
    TestimonialController,
    FaqController,
    ServiceController,
    StudyCaseController,
    TrustedClientController
};

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Public API routes
Route::get('/testimonials', [TestimonialController::class, 'index']);
Route::get('/trusted-clients', [TrustedClientController::class, 'index']);
Route::get('/case-studies', [StudyCaseController::class, 'index']);
Route::get('/services', [ServiceController::class, 'index']);
Route::get('/faqs', [FaqController::class, 'index']);
