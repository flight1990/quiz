<?php

namespace App\Tasks\GuestUsers\V1;

use App\Data\Criterias\WhereFieldCriteria;
use App\Data\Repositories\GuestUserRepository;
use App\Models\GuestUser;
use App\Tasks\Task;
use Prettus\Repository\Exceptions\RepositoryException;

class FindGuestUserByUuidTask extends Task
{
    public function __construct(protected GuestUserRepository $repository)
    {}

    /**
     * @throws RepositoryException
     */
    public function run(string $uuid): GuestUser
    {
        return $this->repository
            ->pushCriteria(new WhereFieldCriteria('uuid', $uuid))
            ->firstOrFail();
    }
}
