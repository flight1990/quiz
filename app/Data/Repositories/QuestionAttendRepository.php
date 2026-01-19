<?php

namespace App\Data\Repositories;

use App\Data\Criterias\SafeRequestCriteria;
use App\Models\QuestionAttend;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Exceptions\RepositoryException;

class QuestionAttendRepository extends BaseRepository
{
    protected array $allowedSort = ['id', 'created_at', 'updated_at'];

    protected array $allowedWith = [
        'question'  => ['quiz'],
        'guestUser' => ['unit'],
        'statuses'
    ];

    /**
     * @throws RepositoryException
     */
    public function boot(): void
    {
        $this->pushCriteria(app(SafeRequestCriteria::class));
    }

    public function model(): string
    {
        return QuestionAttend::class;
    }
}
