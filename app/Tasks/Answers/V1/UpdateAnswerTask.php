<?php

namespace App\Tasks\Answers\V1;

use App\Data\Repositories\AnswerRepository;
use App\Models\Answer;
use App\Tasks\Task;
use Prettus\Validator\Exceptions\ValidatorException;

class UpdateAnswerTask extends Task
{
    public function __construct(protected AnswerRepository $repository)
    {}

    /**
     * @throws ValidatorException
     */
    public function run(array $payload, int $id): Answer
    {
        return $this->repository->update($payload, $id);
    }
}
