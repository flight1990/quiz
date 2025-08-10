<?php

namespace App\Data\Repositories;
use App\Data\Criterias\SafeRequestCriteria;
use App\Models\Option;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Exceptions\RepositoryException;

class OptionRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'id' => '=',
    ];

    protected array $allowedSort = ['id', 'is_other', 'is_correct'];
    protected array $allowedWith = [
        'question' => ['quiz'],
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
        return Option::class;
    }
}
