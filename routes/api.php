<?php

use App\Http\Controllers\V1\Admin\{
    QuizUserController as AdminQuizUserController,
    AnswerController as AdminAnswerController,
    OptionController as AdminOptionController,
    QuestionController as AdminQuestionController,
    GuestUserController as AdminGuestUserController,
    QuizController as AdminQuizController,
    UnitController as AdminUnitController,
    UserController as AdminUserController
};
use App\Http\Controllers\V1\Guest\{
    QuizController as GuestQuizController,
    QuizUserController as GuestQuizUserController,
    UnitController as GuestUnitController,
    AnswerController as GuestAnswerController,
    GuestUserController as GuestGuestUserController
};
use App\Http\Controllers\V1\TokenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Common authenticated routes (Password Grant)
|--------------------------------------------------------------------------
*/
Route::middleware('auth:api')->group(function () {
    Route::delete('token/revoke', [TokenController::class, 'tokenRevoke']);
    Route::get('/me', fn (Request $request) => $request->user());
});

Route::prefix('v1')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Admin routes (Password Grant Token)
    |--------------------------------------------------------------------------
    */
    Route::prefix('admin')->middleware('auth:api')->group(function () {

        // Users
        Route::prefix('users')->group(function () {
            Route::get('/', [AdminUserController::class, 'getUsers']);
            Route::post('/', [AdminUserController::class, 'createUser']);
            Route::get('/{id}', [AdminUserController::class, 'findUserById']);
            Route::patch('/{id}', [AdminUserController::class, 'updateUser']);
            Route::delete('/{id}', [AdminUserController::class, 'deleteUser']);
        });

        // Units
        Route::prefix('units')->group(function () {
            Route::get('/', [AdminUnitController::class, 'getUnits']);
            Route::post('/', [AdminUnitController::class, 'createUnit']);
            Route::get('/{id}', [AdminUnitController::class, 'findUnitById']);
            Route::patch('/{id}', [AdminUnitController::class, 'updateUnit']);
            Route::delete('/{id}', [AdminUnitController::class, 'deleteUnit']);
        });

        // Quizzes
        Route::prefix('quizzes')->group(function () {
            Route::get('/', [AdminQuizController::class, 'getQuizzes']);
            Route::post('/', [AdminQuizController::class, 'createQuiz']);
            Route::get('/{id}', [AdminQuizController::class, 'findQuizById']);
            Route::patch('/{id}', [AdminQuizController::class, 'updateQuiz']);
            Route::delete('/{id}', [AdminQuizController::class, 'deleteQuiz']);
        });

        // Questions
        Route::prefix('questions')->group(function () {
            Route::get('/', [AdminQuestionController::class, 'getQuestions']);
            Route::post('/', [AdminQuestionController::class, 'createQuestion']);
            Route::get('/{id}', [AdminQuestionController::class, 'findQuestionById']);
            Route::patch('/{id}', [AdminQuestionController::class, 'updateQuestion']);
            Route::delete('/{id}', [AdminQuestionController::class, 'deleteQuestion']);
        });

        // Options
        Route::prefix('options')->group(function () {
            Route::get('/', [AdminOptionController::class, 'getOptions']);
            Route::post('/', [AdminOptionController::class, 'createOption']);
            Route::get('/{id}', [AdminOptionController::class, 'findOptionById']);
            Route::patch('/{id}', [AdminOptionController::class, 'updateOption']);
            Route::delete('/{id}', [AdminOptionController::class, 'deleteOption']);
        });

        // Answers
        Route::prefix('answers')->group(function () {
            Route::get('/', [AdminAnswerController::class, 'getAnswers']);
            Route::delete('/{id}', [AdminAnswerController::class, 'deleteAnswer']);
        });

        // Guest Users
        Route::prefix('guest-users')->group(function () {
            Route::get('/', [AdminGuestUserController::class, 'getGuestUsers']);
            Route::get('/{id}', [AdminGuestUserController::class, 'findGuestUserById']);
            Route::patch('/{id}', [AdminGuestUserController::class, 'updateGuestUser']);
            Route::delete('/{id}', [AdminGuestUserController::class, 'deleteGuestUser']);
        });

        // Quiz Users
        Route::prefix('quiz-users')->group(function () {
            Route::get('/', [AdminQuizUserController::class, 'getQuizUsers']);
            Route::delete('/{id}', [AdminQuizUserController::class, 'deleteQuizUser']);
        });
    });

    /*
    |--------------------------------------------------------------------------
    | Public guest routes (No auth)
    |--------------------------------------------------------------------------
    */
    Route::prefix('guest-users')->group(function () {
        Route::post('/token', [GuestGuestUserController::class, 'token']);
        Route::post('/anonymous/token', [GuestGuestUserController::class, 'anonymousToken']);
    });

    Route::prefix('units')->group(function () {
        Route::get('/', [GuestUnitController::class, 'getUnits']);
    });

    /*
    |--------------------------------------------------------------------------
    | Guest routes (Personal Access Token)
    |--------------------------------------------------------------------------
    */
    Route::middleware('auth:guest-api')->group(function () {

        // Guest Users
        Route::prefix('guest-users')->group(function () {
            Route::get('/me', [GuestGuestUserController::class, 'getMe']);
            Route::delete('/token/revoke', [GuestGuestUserController::class, 'tokenRevoke']);
        });

        // Quizzes
        Route::prefix('quizzes')->group(function () {
            Route::get('/', [GuestQuizController::class, 'getQuizzes']);
        });

        // Quiz Users
        Route::prefix('quiz-users')->group(function () {
            Route::get('/', [GuestQuizUserController::class, 'getQuizUsers']);
            Route::post('/', [GuestQuizUserController::class, 'createQuizUser']);
        });

        // Answers
        Route::prefix('answers')->group(function () {
            Route::get('/', [GuestAnswerController::class, 'getAnswers']);
            Route::post('/', [GuestAnswerController::class, 'createAnswer']);
            Route::post('/bulk', [GuestAnswerController::class, 'createBulkAnswers']);
        });
    });
});
