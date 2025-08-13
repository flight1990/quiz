<?php

namespace App\Tasks\Options\V1;

use App\Data\Criterias\WhereFieldCriteria;
use App\Data\Repositories\OptionRepository;
use App\Tasks\Task;
use Prettus\Repository\Exceptions\RepositoryException;

class GetCorrectOptionsByQuestionIdTask extends Task
{
    public function __construct(protected OptionRepository $repository)
    {
    }

    /**
     * @throws RepositoryException
     */
    public function run(int $questionId): array
    {
        return $this->repository
            ->pushCriteria(new WhereFieldCriteria('question_id', $questionId))
            ->pushCriteria(new WhereFieldCriteria('is_correct', true))
            ->pluck('id')
            ->toArray();
    }
}
