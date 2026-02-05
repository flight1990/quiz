<?php

namespace App\Data\Criterias;

use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

class WhereInFieldCriteria extends Criteria
{
    public function __construct(private string $field, private array $values)
    {
    }

    public function apply($model, PrettusRepositoryInterface $repository)
    {
        return $model->whereIn($this->field, $this->values);
    }
}
