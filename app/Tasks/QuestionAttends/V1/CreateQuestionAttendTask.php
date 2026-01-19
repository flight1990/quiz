<?php

namespace App\Tasks\QuestionAttends\V1;

use App\Data\Repositories\QuestionAttendRepository;
use App\Models\QuestionAttend;
use App\Tasks\Task;
use Prettus\Validator\Exceptions\ValidatorException;

class CreateQuestionAttendTask extends Task
{
    public function __construct(protected QuestionAttendRepository $repository)
    {}

    /**
     * @throws ValidatorException
     */
    public function run(array $payload): QuestionAttend
    {
        return $this->repository->firstOrCreate([
            'question_id'   => $payload['question_id'],
            'guest_user_id' => $payload['guest_user_id'],
            'attempt' => $payload['attempt'],
        ]);
    }
}
