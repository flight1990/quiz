<?php

namespace App\Tasks\QuizSessionQuestionLogs\V1;

use App\Data\Repositories\QuizSessionQuestionLogRepository;
use App\Models\QuizSessionQuestionLog;
use App\Tasks\Task;
use Prettus\Validator\Exceptions\ValidatorException;

class UpdateQuizSessionQuestionLogTask extends Task
{
    public function __construct(protected QuizSessionQuestionLogRepository $repository)
    {}

    /**
     * @throws ValidatorException
     */
    public function run(array $payload, int $id): QuizSessionQuestionLog
    {
        return $this->repository->update($payload, $id);
    }
}
