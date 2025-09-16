<?php

namespace App\Tasks\Quizzes\V1;

use App\Data\Criterias\WhereFieldCriteria;
use App\Data\Repositories\QuizRepository;
use App\Models\Quiz;
use App\Tasks\Task;
use Prettus\Repository\Exceptions\RepositoryException;

class FindQuizBySlugTask extends Task
{
    public function __construct(protected QuizRepository $repository)
    {
    }

    /**
     * @throws RepositoryException
     */
    public function run(string $slug): Quiz
    {
        return $this->repository->scopeQuery(function ($q) {
            return $q->select(['quizzes.id', 'title', 'slug']);
        })
            ->with(['units' => function ($q) {
                return $q->select(['units.id', 'name']);
            }])
            ->pushCriteria(new WhereFieldCriteria('slug', $slug))
            ->pushCriteria(new WhereFieldCriteria('is_active', true))
            ->firstOrFail();
    }
}
