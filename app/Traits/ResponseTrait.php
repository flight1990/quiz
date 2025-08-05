<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

trait ResponseTrait
{
    protected int $statusCode = 200;

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function setStatusCode($statusCode): self
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    public function respondWithSuccess($resource, string $message = 'success'): ResourceCollection|JsonResource
    {
        return $resource->additional(['message' => $message]);
    }

    public function respondWithSuccessCreate($resource, string $message = 'success'): JsonResponse
    {
        return $this->setStatusCode(201)->respondWithArray([
            'data' => $resource,
            'message' => $message
        ]);
    }

    public function respondWithArray(array $array, array $headers = [], string $message = 'success'): JsonResponse
    {
        $array = array_merge(['message' => $message], $array);
        return response()->json($array, $this->statusCode, $headers);
    }

    public function respondWithMessage (string $message = 'success', int $code = 200): JsonResponse
    {
        return $this->setStatusCode($code)->respondWithArray([
            'message' => $message,
        ]);
    }

    protected function respondWithError(string $message, array $errors = []): JsonResponse
    {
        if ($this->statusCode === 200) {
            trigger_error(
                "You better have a really good reason for error on a status 200...",
                E_USER_WARNING
            );
        }
        return $this->respondWithArray([
            'errors'  => $errors,
            'message' => $message,
        ]);
    }

    public function errorForbidden(string $message = 'Forbidden', array $errors = []): JsonResponse
    {
        return $this->setStatusCode(403)->respondWithError($message, $errors);
    }

    public function errorInternalError(string $message = 'Internal Error', array $errors = []): JsonResponse
    {
        return $this->setStatusCode(500)->respondWithError($message, $errors);
    }

    public function errorNotFound(string $message = 'Resource Not Found', array $errors = []): JsonResponse
    {
        return $this->setStatusCode(404)->respondWithError($message, $errors);
    }

    public function errorUnauthorized(string $message = 'Unauthorized', array $errors = []): JsonResponse
    {
        return $this->setStatusCode(401)->respondWithError($message, $errors);
    }

    public function errorWrongArgs(string $message = 'Wrong Arguments', array $errors = []): JsonResponse
    {
        return $this->setStatusCode(400)->respondWithError($message, $errors);
    }

    public function noContent($status = 204): JsonResponse
    {
        return new JsonResponse(null, $status);
    }
}
