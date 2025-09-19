<?php

namespace App\Tasks\Options\V1;

use App\Data\Criterias\WhereFieldCriteria;
use App\Data\Repositories\OptionRepository;
use App\Tasks\Task;
use Illuminate\Support\Collection;
use Prettus\Repository\Exceptions\RepositoryException;

class GetOptionsByQuestionIdTask extends Task
{
    public function __construct(protected OptionRepository $repository)
    {}

    /**
     * @throws RepositoryException
     */
    public function run(int $questionId): Collection
    {
        return $this->repository
            ->pushCriteria(new WhereFieldCriteria('question_id', $questionId))
            ->get();
    }
}
