<?php

namespace App\Tasks\QuestionAttends\V1;

use App\Data\Criterias\WhereFieldCriteria;
use App\Data\Repositories\QuestionAttendRepository;
use App\Models\QuestionAttend;
use App\Tasks\Task;
use Prettus\Repository\Exceptions\RepositoryException;

class GetLatestQuestionAttendTask extends Task
{
    public function __construct(protected QuestionAttendRepository $repository)
    {}

    /**
     * @throws RepositoryException
     */
    public function run(int $questionId, int $guestUserId): QuestionAttend | null
    {
        return $this->repository
            ->pushCriteria(new WhereFieldCriteria('question_id', $questionId))
            ->pushCriteria(new WhereFieldCriteria('guest_user_id', $guestUserId))
            ->latest('attempt')
            ->first();
    }
}
