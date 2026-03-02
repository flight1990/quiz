<?php

namespace App\Tasks\Media\V1;

use App\Data\Repositories\MediaRepository;
use App\Models\Media;
use App\Tasks\Task;

class FindMediaByIdTask extends Task
{
    public function __construct(protected MediaRepository $repository)
    {}

    public function run(int $id): Media
    {
        return $this->repository->find($id);
    }
}
