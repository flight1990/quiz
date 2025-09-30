<?php

namespace App\Tasks\Quizzes\V1;

use App\Data\Repositories\QuizRepository;
use App\Exceptions\CannotDeleteRecordException;
use App\Tasks\Task;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DeleteQuizTask extends Task
{
    public function __construct(protected QuizRepository $repository)
    {}
    public function run(int $id): int
    {
        $quiz = $this->repository->find($id);

        if (!$quiz) {
            throw new ModelNotFoundException();
        }

        if ($quiz->questions()->exists()) {
            throw new CannotDeleteRecordException;
        }

        return $this->repository->delete($id);
    }
}
