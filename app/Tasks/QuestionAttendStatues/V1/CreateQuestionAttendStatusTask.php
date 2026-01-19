<?php

namespace App\Tasks\QuestionAttendStatues\V1;

use App\Data\Repositories\QuestionAttendStatusRepository;
use App\Models\QuestionAttendStatus;
use App\Tasks\Task;
use Prettus\Validator\Exceptions\ValidatorException;

class CreateQuestionAttendStatusTask extends Task
{
    public function __construct(protected QuestionAttendStatusRepository $repository)
    {}

    /**
     * @throws ValidatorException
     */
    public function run(array $payload): QuestionAttendStatus
    {
        return $this->repository->create($payload);
    }
}
