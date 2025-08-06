<?php

namespace App\Tasks\Quizzes\V1;

use App\Data\Repositories\QuizRepository;
use App\Models\Quiz;
use App\Tasks\Task;
use Prettus\Validator\Exceptions\ValidatorException;

class CreateQuizTask extends Task
{
    public function __construct(protected QuizRepository $repository)
    {}

    /**
     * @throws ValidatorException
     */
    public function run(array $payload): Quiz
    {
        return $this->repository->create($payload);
    }
}
