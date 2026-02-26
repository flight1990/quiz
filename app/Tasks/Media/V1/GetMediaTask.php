<?php

namespace App\Tasks\Media\V1;

use App\Data\Repositories\MediaRepository;
use App\Tasks\Task;
use Illuminate\Support\Collection;

class GetMediaTask extends Task
{
    public function __construct(protected MediaRepository $repository)
    {}

    public function run(): Collection
    {
        return $this->repository->all();
    }
}
