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
    ];

    protected array $allowedSort = ['id', 'is_active', 'is_anonymous', 'title'];
    protected array $allowedWith = [
        'questions' => ['options'],
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
