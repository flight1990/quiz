<?php

namespace App\Data\Repositories;
use App\Data\Criterias\SafeRequestCriteria;
use App\Models\QuizSessionParticipant;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Exceptions\RepositoryException;

class QuizSessionParticipantRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'id' => '=',
    ];

    protected array $allowedSort = ['id'];

    protected array $allowedWith = [
        'session',
        'guestUser',
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
        return QuizSessionParticipant::class;
    }
}
