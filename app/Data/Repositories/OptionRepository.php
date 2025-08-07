<?php

namespace App\Data\Repositories;
use App\Models\Option;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Exceptions\RepositoryException;

class OptionRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'id' => '=',
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
        return Option::class;
    }
}
