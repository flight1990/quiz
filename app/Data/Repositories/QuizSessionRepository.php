<?php

namespace App\Data\Repositories;
use App\Data\Criterias\SafeRequestCriteria;
use App\Models\QuizSession;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Exceptions\RepositoryException;

class QuizSessionRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'id' => '=',
    ];

    protected array $allowedSort = ['id', 'created_at', 'started_at', 'finished_at'];

    protected array $allowedWith = [
        'quiz' => ['units'],
        'user',
        'currentQuestion' => ['options'],
        'participants',
        'questionLogs'
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
        return QuizSession::class;
    }
}
