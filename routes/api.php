<?php

use App\Http\Controllers\V1\Admin\{
    QuizUserController as AdminQuizUserController,
    AnswerController as AdminAnswerController,
    OptionController as AdminOptionController,
    QuestionController as AdminQuestionController,
    GuestUserController as AdminGuestUserController,
    QuizController as AdminQuizController,
    UnitController as AdminUnitController,
    UserController as AdminUserController,
    RoleController as AdminRoleController,
    PermissionController as AdminPermissionController,
    StatisticController as AdminStatisticController,
    QuizSessionController as AdminQuizSessionController,
    QuizSessionQuestionController as AdminQuizSessionQuestionController,
};
use App\Http\Controllers\V1\Guest\{
    QuizController as GuestQuizController,
    QuizUserController as GuestQuizUserController,
    UnitController as GuestUnitController,
    AnswerController as GuestAnswerController,
    GuestUserController as GuestGuestUserController
};
use App\Http\Controllers\V1\TokenController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Common authenticated routes (Password Grant)
|--------------------------------------------------------------------------
*/
Route::middleware('auth:api')->group(function () {
    Route::delete('token/revoke', [TokenController::class, 'tokenRevoke']);
    Route::get('/me', [TokenController::class, 'getMe']);
});

Route::prefix('v1')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Admin routes (Password Grant Token)
    |--------------------------------------------------------------------------
    */
    Route::prefix('admin')->middleware('auth:api')->group(function () {
        Route::prefix('statistics')->group(function () {
            Route::prefix('quizzes')->group(function () {
                Route::get('/{id}', [AdminStatisticController::class, 'getQuizStatisticById']);
                Route::get('/{id}/questions', [AdminStatisticController::class, 'getQuestionStatisticByQuizId']);
            });

            Route::prefix('questions')->group(function () {
                Route::get('/{id}', [AdminStatisticController::class, 'getQuestionStatisticByQuestionId']);
            });
        });

        Route::prefix('users')->group(function () {
            Route::get('/', [AdminUserController::class, 'getUsers'])->middleware('permission:user.view');
            Route::post('/', [AdminUserController::class, 'createUser'])->middleware('permission:user.create');
            Route::get('/{id}', [AdminUserController::class, 'findUserById'])->middleware('permission:user.view');
            Route::patch('/{id}', [AdminUserController::class, 'updateUser'])->middleware('permission:user.edit');
            Route::delete('/{id}', [AdminUserController::class, 'deleteUser'])->middleware('permission:user.delete');
        });

        Route::prefix('roles')->group(function () {
            Route::get('/', [AdminRoleController::class, 'getRoles'])->middleware('permission:role.view');
            Route::post('/', [AdminRoleController::class, 'createRole'])->middleware('permission:role.create');
            Route::get('/{id}', [AdminRoleController::class, 'findRoleById'])->middleware('permission:role.view');
            Route::patch('/{id}', [AdminRoleController::class, 'updateRole'])->middleware('permission:role.edit');
            Route::delete('/{id}', [AdminRoleController::class, 'deleteRole'])->middleware('permission:role.delete');
        });

        Route::prefix('permissions')->group(function () {
            Route::get('/', [AdminPermissionController::class, 'getPermissions'])->middleware('permission:role.view');
        });

        Route::prefix('units')->group(function () {
            Route::get('/', [AdminUnitController::class, 'getUnits'])->middleware('permission:unit.view');;
            Route::post('/', [AdminUnitController::class, 'createUnit'])->middleware('permission:unit.create');
            Route::get('/{id}', [AdminUnitController::class, 'findUnitById'])->middleware('permission:unit.view');
            Route::patch('/{id}', [AdminUnitController::class, 'updateUnit'])->middleware('permission:unit.edit');
            Route::delete('/{id}', [AdminUnitController::class, 'deleteUnit'])->middleware('permission:unit.delete');
        });

        Route::prefix('quizzes')->group(function () {
            Route::get('/', [AdminQuizController::class, 'getQuizzes'])->middleware('permission:quiz.view');
            Route::post('/', [AdminQuizController::class, 'createQuiz'])->middleware('permission:quiz.create');
            Route::get('/{id}', [AdminQuizController::class, 'findQuizById'])->middleware('permission:quiz.view');
            Route::patch('/{id}', [AdminQuizController::class, 'updateQuiz'])->middleware('permission:quiz.edit');
            Route::delete('/{id}', [AdminQuizController::class, 'deleteQuiz'])->middleware('permission:quiz.delete');
        });

        Route::prefix('questions')->group(function () {
            Route::get('/', [AdminQuestionController::class, 'getQuestions'])->middleware('permission:question.view');
            Route::post('/', [AdminQuestionController::class, 'createQuestion'])->middleware('permission:question.create');
            Route::get('/{id}', [AdminQuestionController::class, 'findQuestionById'])->middleware('permission:question.view');
            Route::patch('/{id}', [AdminQuestionController::class, 'updateQuestion'])->middleware('permission:question.edit');
            Route::delete('/{id}', [AdminQuestionController::class, 'deleteQuestion'])->middleware('permission:question.delete');
        });

        Route::prefix('options')->group(function () {
            Route::get('/', [AdminOptionController::class, 'getOptions'])->middleware('permission:option.view');
            Route::post('/', [AdminOptionController::class, 'createOption'])->middleware('permission:option.create');
            Route::get('/{id}', [AdminOptionController::class, 'findOptionById'])->middleware('permission:option.view');
            Route::patch('/{id}', [AdminOptionController::class, 'updateOption'])->middleware('permission:option.edit');
            Route::delete('/{id}', [AdminOptionController::class, 'deleteOption'])->middleware('permission:option.delete');
        });

        Route::prefix('answers')->group(function () {
            Route::get('/', [AdminAnswerController::class, 'getAnswers'])->middleware('permission:answer.view');
            Route::delete('/{id}', [AdminAnswerController::class, 'deleteAnswer'])->middleware('permission:answer.delete');
        });

        Route::prefix('guest-users')->group(function () {
            Route::get('/', [AdminGuestUserController::class, 'getGuestUsers'])->middleware('permission:guest-user.view');
            Route::get('/{id}', [AdminGuestUserController::class, 'findGuestUserById'])->middleware('permission:guest-user.view');
            Route::patch('/{id}', [AdminGuestUserController::class, 'updateGuestUser'])->middleware('permission:guest-user.view');
            Route::delete('/{id}', [AdminGuestUserController::class, 'deleteGuestUser'])->middleware('permission:guest-user.delete');
        });

        Route::prefix('quiz-users')->group(function () {
            Route::get('/', [AdminQuizUserController::class, 'getQuizUsers'])->middleware('permission:quiz-user.view');
            Route::delete('/{id}', [AdminQuizUserController::class, 'deleteQuizUser'])->middleware('permission:quiz-user.delete');
        });

        Route::prefix('quiz-sessions')->group(function () {
            Route::get('/', [AdminQuizSessionController::class, 'getSessions']);

            Route::post('/create', [AdminQuizSessionController::class, 'createSession']);
            Route::post('/{id}/start', [AdminQuizSessionController::class, 'startSession']);
            Route::post('/{id}/finish', [AdminQuizSessionController::class, 'finishSession']);

            Route::get('/{id}', [AdminQuizSessionController::class, 'findSessionById']);
            Route::delete('/{id}', [AdminQuizSessionController::class, 'deleteSession']);

            Route::post('/{id}/current-question/set', [AdminQuizSessionQuestionController::class, 'setQuestion']);
            Route::post('/{id}/current-question/skip', [AdminQuizSessionQuestionController::class, 'skipQuestion']);
            Route::post('/{id}/current-question/finish', [AdminQuizSessionQuestionController::class, 'finishQuestion']);
        });

        Route::prefix('quiz-sessions-questions')->group(function () {
            Route::get('/', [AdminQuizSessionQuestionController::class, 'getQuestions']);
            Route::get('/{id}', [AdminQuizSessionQuestionController::class, 'findQuestionById']);
            Route::delete('/{id}', [AdminQuizSessionQuestionController::class, 'deleteQuestion']);
        });
    });

    /*
    |--------------------------------------------------------------------------
    | Guest routes (Personal Access Token)
    |--------------------------------------------------------------------------
    */
    Route::middleware('auth:guest-api')->group(function () {
        Route::prefix('guest-users')->group(function () {
            Route::get('/me', [GuestGuestUserController::class, 'getMe']);
            Route::delete('/token/revoke', [GuestGuestUserController::class, 'tokenRevoke']);
        });

        Route::prefix('quizzes')->group(function () {
            Route::get('/', [GuestQuizController::class, 'getQuizzes']);
            Route::get('/{id}', [GuestQuizController::class, 'findQuizById'])
                ->where('id', '[0-9]+');
        });

        Route::prefix('quiz-users')->group(function () {
            Route::get('/', [GuestQuizUserController::class, 'getQuizUsers']);
            Route::post('/', [GuestQuizUserController::class, 'createQuizUser']);
        });

        Route::prefix('answers')->group(function () {
            Route::get('/', [GuestAnswerController::class, 'getAnswers']);
            Route::post('/', [GuestAnswerController::class, 'createAnswer']);
            Route::post('/bulk', [GuestAnswerController::class, 'createBulkAnswers']);
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

    Route::prefix('quizzes')->group(function () {
        Route::get('/{slug}', [GuestQuizController::class, 'findQuizBySlug'])
            ->where('slug', '[A-Za-z0-9\-_]+');
    });

    Route::prefix('units')->group(function () {
        Route::get('/', [GuestUnitController::class, 'getUnits']);
    });
});
