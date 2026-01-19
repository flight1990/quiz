<?php

namespace App\Data\Repositories;

use App\Data\Criterias\SafeRequestCriteria;
use App\Models\QuestionAttendStatus;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Exceptions\RepositoryException;

class QuestionAttendStatusRepository extends BaseRepository
{
    /**
     * @throws RepositoryException
     */
    public function boot(): void
    {
        $this->pushCriteria(app(SafeRequestCriteria::class));
    }

    public function model(): string
    {
        return QuestionAttendStatus::class;
    }
}
