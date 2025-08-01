<?php

use App\Http\Controllers\Api\DocumentController;
use App\Http\Controllers\Api\GroupesController;
use App\Http\Controllers\Api\MatieresController;
use App\Http\Controllers\Api\NotificationsController;
use App\Http\Controllers\Api\TelechargementsController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::apiResource('groupes', GroupesController::class);
Route::apiResource('matieres', MatieresController::class);
Route::apiResource('users', UserController::class);
Route::apiResource('documents', DocumentController::class);
Route::apiResource('notifications',NotificationsController::class);
Route::apiResource('telechargements', TelechargementsController::class);
