<?php

namespace App\Tasks;

abstract class Task
{
    public function pushCriteria($criteria): self
    {
        if (isset($this->repository)) $this->repository->pushCriteria($criteria);
        return $this;
    }
}
