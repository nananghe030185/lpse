<?php

use App\Http\Controllers\Api\KlpdController;
use App\Http\Controllers\Api\LelangController;
use App\Http\Controllers\Api\LpseController;
use App\Http\Controllers\Api\SatkerController;
use App\Http\Controllers\Api\SwakelolaController;
use App\Http\Controllers\Api\TenderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// API Request
Route::apiResource('klpd', KlpdController::class)->names('api.klpd');

Route::apiResource('lpse', LpseController::class)->names('api.lpse');

Route::apiResource('tender', TenderController::class)->names('api.tender');

Route::apiResource('satker', SatkerController::class)->names('api.satker');

Route::apiResource('lelang', LelangController::class)->names('api.lelang');

Route::apiResource('swakelola', SwakelolaController::class)->names('api.swakelola');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
