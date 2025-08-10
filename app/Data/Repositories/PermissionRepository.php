<?php

namespace App\Data\Repositories;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Exceptions\RepositoryException;
use Spatie\Permission\Models\Permission;

class PermissionRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'id' => '=',
        'name' => 'like',
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
        return Permission::class;
    }
}
