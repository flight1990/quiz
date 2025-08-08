<?php

namespace App\Http\Controllers\V1\Admin;

use App\Actions\QuizUser\V1\DeleteQuizUserAction;
use App\Actions\QuizUser\V1\GetQuizUsersAction;
use App\Http\Controllers\ApiController;
use App\Http\Resources\V1\QuizUser\QuizUserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class QuizUserController extends ApiController
{
    public function getQuizUsers(Request $request): ResourceCollection|JsonResource
    {
        $data = app(GetQuizUsersAction::class)->run($request->all());
        return $this->respondWithSuccess(QuizUserResource::collection($data));
    }

    public function deleteQuizUser(int $id): JsonResponse
    {
        app(DeleteQuizUserAction::class)->run($id);
        return $this->noContent();
    }
}
