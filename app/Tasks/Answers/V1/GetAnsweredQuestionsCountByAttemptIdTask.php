<?php

namespace App\Tasks\Answers\V1;

use App\Data\Criterias\WhereFieldCriteria;
use App\Data\Repositories\AnswerRepository;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAnsweredQuestionsCountByAttemptIdTask
{
    public function __construct(protected AnswerRepository $repository)
    {
    }

    /**
     * @throws RepositoryException
     */
    public function run(int $attemptId): int
    {
        return $this->repository->scopeQuery(fn($q) => $q->select('question_id')->distinct('question_id'))
            ->pushCriteria(new WhereFieldCriteria('attempt_id', $attemptId))
            ->count();
    }
}
