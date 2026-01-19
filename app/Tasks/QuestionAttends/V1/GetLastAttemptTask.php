<?php

namespace App\Tasks\QuestionAttends\V1;

use App\Data\Criterias\WhereFieldCriteria;
use App\Data\Repositories\QuestionAttendRepository;
use App\Tasks\Task;
use Prettus\Repository\Exceptions\RepositoryException;

class GetLastAttemptTask extends Task
{
    public function __construct(protected QuestionAttendRepository $repository)
    {}

    /**
     * @throws RepositoryException
     */
    public function run(int $questionId, int $guestUserId): int | null
    {
        return $this->repository
            ->pushCriteria(new WhereFieldCriteria('question_id', $questionId))
            ->pushCriteria(new WhereFieldCriteria('guest_user_id', $guestUserId))
            ->max('attempt');
    }
}
