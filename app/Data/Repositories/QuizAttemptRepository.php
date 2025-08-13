<?php

namespace App\Data\Repositories;

use App\Data\Criterias\SafeRequestCriteria;
use App\Models\QuizAttempt;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Exceptions\RepositoryException;

class QuizAttemptRepository extends BaseRepository
{
    protected array $allowedSort = ['id'];

//    protected array $allowedWith = [
//        'options',
//        'question' => ['options', 'quiz'],
//        'guestUser' => ['unit']
//    ];

    /**
     * @throws RepositoryException
     */
    public function boot(): void
    {
        $this->pushCriteria(app(SafeRequestCriteria::class));
    }

    public function model(): string
    {
        return QuizAttempt::class;
    }
}
