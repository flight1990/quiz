<?php

namespace App\Data\Repositories;
use App\Models\Unit;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Exceptions\RepositoryException;

class UnitRepository extends BaseRepository
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
        return Unit::class;
    }
}
