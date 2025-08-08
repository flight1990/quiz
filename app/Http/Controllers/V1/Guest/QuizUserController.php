<?php

namespace App\Http\Controllers\V1\Guest;

use App\Actions\QuizUser\V1\CreateQuizUserAction;
use App\Http\Controllers\ApiController;
use App\Http\Requests\V1\QuizUser\CreateQuizUserRequest;
use App\Http\Resources\V1\QuizUser\QuizUserResource;
use Illuminate\Http\JsonResponse;

class QuizUserController extends ApiController
{
    public function createQuizUser(CreateQuizUserRequest $request): JsonResponse
    {
        $data = app(CreateQuizUserAction::class)->run($request->validated());
        return $this->respondWithSuccessCreate(new QuizUserResource($data));
    }
}
