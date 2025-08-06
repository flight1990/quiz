<?php

use App\Http\Controllers\V1\QuizController;
use App\Http\Controllers\V1\TokenController;
use App\Http\Controllers\V1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->group(function () {
    Route::delete('token/revoke', [TokenController::class, 'tokenRevoke']);

    Route::get('/me', function (Request $request) {
        return $request->user();
    });

    Route::prefix('v1')->group(function () {
        Route::prefix('users')->group(function () {
            Route::get('/', [UserController::class, 'getUsers']);
            Route::post('/', [UserController::class, 'createUser']);
            Route::get('/{id}', [UserController::class, 'findUserById']);
            Route::patch('/{id}', [UserController::class, 'updateUser']);
            Route::delete('/{id}', [UserController::class, 'deleteUser']);
        });

        Route::prefix('quizzes')->group(function () {
            Route::get('/', [QuizController::class, 'getQuizzes']);
            Route::post('/', [QuizController::class, 'createQuiz']);
            Route::get('/{id}', [QuizController::class, 'findQuizById']);
            Route::patch('/{id}', [QuizController::class, 'updateQuiz']);
            Route::delete('/{id}', [QuizController::class, 'deleteQuiz']);
        });
    });
});



