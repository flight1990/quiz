<?php

namespace App\Tasks\QuizAttempts;

use App\Data\Criterias\WhereFieldCriteria;
use App\Data\Repositories\QuizAttemptRepository;
use App\Models\QuizAttempt;
use App\Tasks\Task;
use Prettus\Repository\Exceptions\RepositoryException;
use Prettus\Validator\Exceptions\ValidatorException;

class FindUnfinishedQuizAttemptTask extends Task
{
    public function __construct(protected QuizAttemptRepository $repository)
    {
    }


    /**
     * @throws RepositoryException
     */
    public function run(int $guestUserId, int $quizId): QuizAttempt | null
    {
        return $this->repository
            ->pushCriteria(new WhereFieldCriteria('guest_user_id', $guestUserId))
            ->pushCriteria(new WhereFieldCriteria('quiz_id', $quizId))
            ->pushCriteria(new WhereFieldCriteria('status', 'started'))
            ->first();
    }
}
