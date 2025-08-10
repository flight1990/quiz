<?php

namespace App\Tasks\GuestUsers\V1;

use App\Data\Repositories\GuestUserRepository;
use App\Tasks\Task;
use Prettus\Validator\Exceptions\ValidatorException;

class CreateGuestUserTask extends Task
{
    public function __construct(protected GuestUserRepository $repository)
    {}

    /**
     * @throws ValidatorException
     */
    public function run(array $payload): array
    {
        $guestUser = $this->repository->create($payload);
        $accessToken = $guestUser->createToken('guest-token')->accessToken;

        return [
            'guestUser' => $guestUser,
            'accessToken' => $accessToken
        ];
    }
}
