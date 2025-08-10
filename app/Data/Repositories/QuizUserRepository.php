<?php

namespace App\Data\Repositories;
use App\Data\Criterias\SafeRequestCriteria;
use App\Models\QuizUser;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Exceptions\RepositoryException;

class QuizUserRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'id' => '=',
    ];

    protected array $allowedSort = ['id', 'completed_at'];

    protected array $allowedWith = [
        'quiz' => ['questions'],
        'guestUser' => ['unit'],
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
        return QuizUser::class;
    }
}
