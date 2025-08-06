<?php

namespace App\Data\Repositories;
use App\Models\Quiz;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Exceptions\RepositoryException;

class QuizRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'id' => '=',
        'title' => 'like',
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
        return Quiz::class;
    }
}
