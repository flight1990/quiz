<?php

namespace App\Data\Repositories;
use App\Data\Criterias\SafeRequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Exceptions\RepositoryException;
use Spatie\Permission\Models\Role;

class RoleRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'id' => '=',
        'name' => 'like',
    ];

    protected array $allowedSort = ['id','name'];
    protected array $allowedWith  = [
        'permissions',
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
        return Role::class;
    }
}
