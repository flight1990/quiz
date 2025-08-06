<?php

namespace App\Tasks\Quizzes\V1;

use App\Data\Repositories\QuizRepository;
use App\Models\Quiz;
use App\Tasks\Task;
use Prettus\Validator\Exceptions\ValidatorException;

class UpdateQuizTask extends Task
{
    public function __construct(protected QuizRepository $repository)
    {}

    /**
     * @throws ValidatorException
     */
    public function run(array $payload, int $id): Quiz
    {
        return $this->repository->update($payload, $id);
    }
}
