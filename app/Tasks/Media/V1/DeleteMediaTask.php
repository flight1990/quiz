<?php

namespace App\Tasks\Media\V1;

use App\Data\Repositories\MediaRepository;
use App\Tasks\Task;

class DeleteMediaTask extends Task
{
    public function __construct(protected MediaRepository $repository)
    {}
    public function run(int $id): int
    {
        return $this->repository->delete($id);
    }
}
