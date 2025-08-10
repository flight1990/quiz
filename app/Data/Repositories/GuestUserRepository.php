<?php

namespace App\Data\Repositories;
use App\Data\Criterias\SafeRequestCriteria;
use App\Models\GuestUser;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Exceptions\RepositoryException;

class GuestUserRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'id' => '=',
        'uuid' => '=',
        'name' => 'like',
        'ip_address' => 'like',
        'user_agent' => 'like',
    ];

    protected array $allowedSort = ['id', 'name'];
    protected array $allowedWith = [
        'unit',
        'answers' =>['question'],
        'quizUsers',
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
        return GuestUser::class;
    }
}
