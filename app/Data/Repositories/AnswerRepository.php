<?php

namespace App\Data\Repositories;

use App\Data\Criterias\SafeRequestCriteria;
use App\Models\Answer;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Exceptions\RepositoryException;

class AnswerRepository extends BaseRepository
{
    protected array $allowedSort = ['id'];
    protected array $allowedWith = [
        'options',
        'question' => ['options', 'quiz'],
        'session',
        'guestUser' => ['unit']
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
        return Answer::class;
    }
}
