<?php

use App\Http\Controllers\V1\Admin\AnswerController as AdminAnswerController;
use App\Http\Controllers\V1\Admin\OptionController as AdminOptionController;
use App\Http\Controllers\V1\Admin\QuestionController as AdminQuestionController;
use App\Http\Controllers\V1\Admin\GuestUserController as AdminGuestUserController;
use App\Http\Controllers\V1\Admin\QuizController as AdminQuizController;
use App\Http\Controllers\V1\Admin\UnitController as AdminUnitController;
use App\Http\Controllers\V1\Admin\UserController as AdminUserController;
use App\Http\Controllers\V1\Guest\UnitController as GuestUnitController;
use App\Http\Controllers\V1\Guest\AnswerController as GuestAnswerController;
use App\Http\Controllers\V1\Guest\GuestUserController as GuestGuestUserController;
use App\Http\Controllers\V1\TokenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->group(function () {
    Route::delete('token/revoke', [TokenController::class, 'tokenRevoke']);

    Route::get('/me', function (Request $request) {
        return $request->user();
    });
});

Route::prefix('v1')->group(function () {
    Route::prefix('admin')->middleware('auth:api')->group(function () {
        Route::prefix('users')->middleware('auth:api')->group(function () {
            Route::get('/', [AdminUserController::class, 'getUsers']);
            Route::post('/', [AdminUserController::class, 'createUser']);
            Route::get('/{id}', [AdminUserController::class, 'findUserById']);
            Route::patch('/{id}', [AdminUserController::class, 'updateUser']);
            Route::delete('/{id}', [AdminUserController::class, 'deleteUser']);
        });

        Route::prefix('units')->group(function () {
            Route::get('/', [AdminUnitController::class, 'getUnits']);
            Route::post('/', [AdminUnitController::class, 'createUnit']);
            Route::get('/{id}', [AdminUnitController::class, 'findUnitById']);
            Route::patch('/{id}', [AdminUnitController::class, 'updateUnit']);
            Route::delete('/{id}', [AdminUnitController::class, 'deleteUnit']);
        });

        Route::prefix('quizzes')->group(function () {
            Route::get('/', [AdminQuizController::class, 'getQuizzes']);
            Route::post('/', [AdminQuizController::class, 'createQuiz']);
            Route::get('/{id}', [AdminQuizController::class, 'findQuizById']);
            Route::patch('/{id}', [AdminQuizController::class, 'updateQuiz']);
            Route::delete('/{id}', [AdminQuizController::class, 'deleteQuiz']);
        });

        Route::prefix('questions')->group(function () {
            Route::get('/', [AdminQuestionController::class, 'getQuestions']);
            Route::post('/', [AdminQuestionController::class, 'createQuestion']);
            Route::get('/{id}', [AdminQuestionController::class, 'findQuestionById']);
            Route::patch('/{id}', [AdminQuestionController::class, 'updateQuestion']);
            Route::delete('/{id}', [AdminQuestionController::class, 'deleteQuestion']);
        });

        Route::prefix('options')->group(function () {
            Route::get('/', [AdminOptionController::class, 'getOptions']);
            Route::post('/', [AdminOptionController::class, 'createOption']);
            Route::get('/{id}', [AdminOptionController::class, 'findOptionById']);
            Route::patch('/{id}', [AdminOptionController::class, 'updateOption']);
            Route::delete('/{id}', [AdminOptionController::class, 'deleteOption']);
        });

        Route::prefix('answers')->group(function () {
            Route::get('/', [AdminAnswerController::class, 'getAnswers']);
            Route::delete('/{id}', [AdminAnswerController::class, 'deleteAnswer']);
        });

        Route::prefix('guest-users')->group(function () {
            Route::get('/', [AdminGuestUserController::class, 'getGuestUsers']);
            Route::get('/{id}', [AdminGuestUserController::class, 'findGuestUserById']);
            Route::patch('/{id}', [AdminGuestUserController::class, 'updateGuestUser']);
            Route::delete('/{id}', [AdminGuestUserController::class, 'deleteGuestUser']);
        });
    });

    Route::prefix('guest-users')->group(function () {
        Route::post('/', [GuestGuestUserController::class, 'createGuestUser']);
        Route::get('/{uuid}', [GuestGuestUserController::class, 'findGuestUserByUuid']);
    });

    Route::prefix('answers')->group(function () {
        Route::post('/', [GuestAnswerController::class, 'createAnswer']);
        Route::post('/bulk', [GuestAnswerController::class, 'createBulkAnswers']);
    });

    Route::prefix('units')->group(function () {
        Route::get('/', [GuestUnitController::class, 'getUnits']);
        Route::get('/{id}', [GuestUnitController::class, 'findUnitById']);
    });
});



