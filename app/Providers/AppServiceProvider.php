<?php

namespace App\Providers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\QuestionAttend;
use App\Models\QuestionAttendStatus;
use App\Models\Quiz;
use App\Observers\AnswerObserver;
use App\Observers\QuestionAttendObserver;
use App\Observers\QuestionAttendStatusObserver;
use App\Observers\QuestionObserver;
use App\Observers\QuizObserver;
use Carbon\CarbonInterval;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Quiz::observe(QuizObserver::class);
        Answer::observe(AnswerObserver::class);
        Question::observe(QuestionObserver::class);
        QuestionAttend::observe(QuestionAttendObserver::class);
        QuestionAttendStatus::observe(QuestionAttendStatusObserver::class);

        Passport::tokensExpireIn(CarbonInterval::days(2));
        Passport::refreshTokensExpireIn(CarbonInterval::days(3));
        Passport::personalAccessTokensExpireIn(CarbonInterval::months(6));
        Passport::enablePasswordGrant();
    }
}
