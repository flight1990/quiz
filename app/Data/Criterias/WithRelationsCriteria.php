<?php

namespace App\Data\Criterias;

use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

class WithRelationsCriteria extends Criteria
{
    public function __construct(protected array $with)
    {
    }

    public function apply($model, PrettusRepositoryInterface $repository)
    {
        if (count($this->with)) {
            foreach ($this->with as $key => $include) {
                $model = $model->with([$key => $include]);
            }
        }
        return $model;
    }
}
