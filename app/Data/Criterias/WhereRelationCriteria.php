<?php

namespace App\Data\Criterias;

use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

class WhereRelationCriteria extends Criteria
{
    public function __construct(
        private string $relation,
        private string $field,
        private mixed $value,
        private string $operator = '='
    ) {
    }

    public function apply($model, PrettusRepositoryInterface $repository)
    {
        return $model->whereHas($this->relation, function ($query) {
            $query->where(
                $this->field,
                $this->operator,
                $this->value
            );
        });
    }
}
