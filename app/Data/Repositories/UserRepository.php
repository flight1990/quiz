<?php

namespace App\Data\Repositories;
use App\Data\Criterias\SafeRequestCriteria;
use App\Models\User;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Exceptions\RepositoryException;

class UserRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'id' => '=',
        'name' => 'like',
        'email' => 'like'
    ];

    protected array $allowedSort = ['id','name','email'];
    protected array $allowedWith  = [
        'unit',
        'roles' => ['permissions']
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
        return User::class;
    }
}
