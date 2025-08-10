<?php

namespace App\Http\Controllers\V1\Guest;

use App\Actions\QuizUser\V1\CreateQuizUserAction;
use App\Actions\QuizUser\V1\GetQuizUsersAction;
use App\Http\Controllers\ApiController;
use App\Http\Requests\V1\QuizUser\CreateQuizUserRequest;
use App\Http\Resources\V1\QuizUser\QuizUserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class QuizUserController extends ApiController
{
    public function getQuizUsers(Request $request): ResourceCollection|JsonResource
    {
        $params = $request->all();
        $params['guest_user_id'] = auth('guest-api')->id();

        $data = app(GetQuizUsersAction::class)->run($params);
        return $this->respondWithSuccess(QuizUserResource::collection($data));
    }

    public function createQuizUser(CreateQuizUserRequest $request): JsonResponse
    {
        $data = app(CreateQuizUserAction::class)->run($request->validated());
        return $this->respondWithSuccessCreate(new QuizUserResource($data));
    }
}
