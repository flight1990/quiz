<?php

namespace App\Tasks\Questions\V1;

use App\Data\Repositories\QuestionRepository;
use App\Models\Question;
use App\Tasks\Task;
use Prettus\Validator\Exceptions\ValidatorException;

class UpdateQuestionTask extends Task
{
    public function __construct(protected QuestionRepository $repository)
    {}

    /**
     * @throws ValidatorException
     */
    public function run(array $payload, int $id): Question
    {
        return $this->repository->update($payload, $id);
    }
}
