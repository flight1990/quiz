<?php

namespace App\Actions\QuizUser\V1;

use App\Actions\Action;
use App\Models\QuizUser;
use App\Tasks\QuizUser\V1\CreateQuizUserTask;
use Carbon\Carbon;
use Prettus\Validator\Exceptions\ValidatorException;

class CreateQuizUserAction extends Action
{
    /**
     * @throws ValidatorException
     */
    public function run(array $payload): QuizUser
    {
        $payload['completed_at'] = Carbon::now();
        $payload['guest_user_id'] = auth('guest-api')->id();

        return app(CreateQuizUserTask::class)->run($payload);
    }
}
