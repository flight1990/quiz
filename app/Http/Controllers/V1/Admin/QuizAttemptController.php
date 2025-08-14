<?php

namespace App\Http\Controllers\V1\Admin;

use App\Actions\QuizAttempts\V1\DeleteQuizAttemptAction;
use App\Actions\QuizAttempts\V1\GetQuizAttemptsAction;
use App\Http\Controllers\ApiController;
use App\Http\Resources\V1\QuizAttempts\QuizAttemptResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class QuizAttemptController extends ApiController
{
    public function getQuizAttempts(Request $request): ResourceCollection|JsonResource
    {
        $data = app(GetQuizAttemptsAction::class)->run($request->all());
        return $this->respondWithSuccess(QuizAttemptResource::collection($data));
    }

    public function deleteQuizAttempt(int $id): JsonResponse
    {
        app(DeleteQuizAttemptAction::class)->run($id);
        return $this->noContent();
    }
}
