<?php

use App\Http\Controllers\Api\DocumentController;
use App\Http\Controllers\Api\GroupesController;
use App\Http\Controllers\Api\MatieresController;
use App\Http\Controllers\Api\NotificationsController;
use App\Http\Controllers\Api\TelechargementsController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

// Routes publiques (inscription, connexion)
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

// Routes protégées (nécessitent d’être authentifié via sanctum)
Route::middleware('auth:sanctum')->group(function () {

    Route::get('/me', [UserController::class, 'me']);
    Route::post('/logout', [UserController::class, 'logout']);

    // API RESTful pour les groupes, matières, documents, notifications et téléchargements
    Route::apiResource('groupes', GroupesController::class);
    Route::apiResource('matieres', MatieresController::class);
    Route::apiResource('documents', DocumentController::class);
    Route::apiResource('notifications', NotificationsController::class);
    Route::apiResource('telechargements', TelechargementsController::class);

    // Route spécifique pour télécharger un document (à définir dans DocumentController)
    Route::get('/documents/{id}/download', [DocumentController::class, 'download']);
});
