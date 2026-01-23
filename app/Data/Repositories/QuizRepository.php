<?php

namespace App\Data\Repositories;
use App\Data\Criterias\SafeRequestCriteria;
use App\Models\Quiz;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Exceptions\RepositoryException;

class QuizRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'id' => '=',
        'title' => 'like',
        'type' => '='
    ];

    protected array $allowedSort = ['id', 'is_active', 'is_anonymous', 'title', 'type'];
    protected array $allowedWith = [
        'questions' => ['options'],
        'units' => ['users'],
        'sessions',
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
        return Quiz::class;
    }
}
