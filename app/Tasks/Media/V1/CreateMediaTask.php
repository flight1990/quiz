<?php

namespace App\Tasks\Media\V1;

use App\Data\Repositories\MediaRepository;
use App\Models\Media;
use App\Tasks\Task;
use Prettus\Validator\Exceptions\ValidatorException;

class CreateMediaTask extends Task
{
    public function __construct(protected MediaRepository $repository)
    {}

    /**
     * @throws ValidatorException
     */
    public function run(array $payload): Media
    {
        return $this->repository->create($payload);
    }
}
