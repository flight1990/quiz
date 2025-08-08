<?php

namespace App\Data\Repositories;
use App\Models\QuizUser;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Exceptions\RepositoryException;

class QuizUserRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'id' => '=',
    ];

    /**
     * @throws RepositoryException
     */
    public function boot(): void
    {
        $this->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
    }

    public function model(): string
    {
        return QuizUser::class;
    }
}
