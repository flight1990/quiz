<?php

namespace App\Tasks\QuizSessionQuestionLogs\V1;

use App\Data\Repositories\QuizSessionQuestionLogRepository;
use App\Models\QuizSessionQuestionLog;
use App\Tasks\Task;
use Prettus\Validator\Exceptions\ValidatorException;

class CreateQuizSessionQuestionLogTask extends Task
{
    public function __construct(protected QuizSessionQuestionLogRepository $repository)
    {}

    /**
     * @throws ValidatorException
     */
    public function run(array $payload): QuizSessionQuestionLog
    {
        return $this->repository->create($payload);
    }
}
