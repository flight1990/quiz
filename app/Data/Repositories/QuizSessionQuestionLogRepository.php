<?php

namespace App\Data\Repositories;
use App\Data\Criterias\SafeRequestCriteria;
use App\Models\QuizSessionQuestionLog;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Exceptions\RepositoryException;

class QuizSessionQuestionLogRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'id' => '=',
    ];

    protected array $allowedSort = ['id'];

    protected array $allowedWith = [
        'session',
        'question',
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
        return QuizSessionQuestionLog::class;
    }
}
