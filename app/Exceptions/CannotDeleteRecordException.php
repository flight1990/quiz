<?php

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;

class CannotDeleteRecordException extends HttpException
{
    public function __construct(string $message = "It is not possible to delete a record because it has relations.", int $statusCode = 422)
    {
        parent::__construct($statusCode, $message);
    }
}
