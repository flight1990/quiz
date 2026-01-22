<?php

namespace App\Tasks\QuizSessionParticipants\V1;

use App\Data\Criterias\WhereFieldCriteria;
use App\Data\Repositories\QuizSessionParticipantRepository;
use App\Models\QuizSessionParticipant;
use App\Tasks\Task;
use Prettus\Validator\Exceptions\ValidatorException;

class FindActiveUserQuizSessionTask extends Task
{
    public function __construct(protected QuizSessionParticipantRepository $repository)
    {}

    /**
     * @throws ValidatorException
     */
    public function run(int $sessionId, int $guestUserId, array $columns = ['*']): QuizSessionParticipant
    {
        return $this->repository
            ->pushCriteria(new WhereFieldCriteria('quiz_session_id', $sessionId))
            ->pushCriteria(new WhereFieldCriteria('guest_user_id', $guestUserId))
            ->pushCriteria(new WhereFieldCriteria('left_at', null))
            ->firstOrFail($columns);
    }
}
