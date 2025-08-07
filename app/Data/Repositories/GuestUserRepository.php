<?php

namespace App\Data\Repositories;
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

    /**
     * @throws RepositoryException
     */
    public function boot(): void
    {
        $this->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
    }

    public function model(): string
    {
        return GuestUser::class;
    }
}
