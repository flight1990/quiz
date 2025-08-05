<?php

namespace App\Data\Criterias;

use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

class WhereFieldCriteria extends Criteria
{
    public function __construct(private string $field, private mixed $value, private string $operator = '=')
    {
    }

    public function apply($model, PrettusRepositoryInterface $repository)
    {
        return $model->where($this->field, $this->operator, $this->value);
    }
}
