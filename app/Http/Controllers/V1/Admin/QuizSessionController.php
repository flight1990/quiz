<?php

namespace App\Http\Controllers\V1\Admin;

use App\Actions\QuizSessions\V1\CreateQuizSessionAction;
use App\Actions\QuizSessions\V1\DeleteQuizSessionAction;
use App\Actions\QuizSessions\V1\FindQuizSessionByIdAction;
use App\Actions\QuizSessions\V1\FinishQuizSessionAction;
use App\Actions\QuizSessions\V1\GetQuizSessionsAction;
use App\Actions\QuizSessions\V1\StartQuizSessionAction;
use App\Http\Controllers\ApiController;
use App\Http\Requests\V1\QuizSession\CreateQuizSessionRequest;
use App\Http\Resources\V1\QuizSessions\QuizSessionResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class QuizSessionController extends ApiController
{
    public function getQuizSessions(Request $request): ResourceCollection|JsonResource
    {
        $data = app(GetQuizSessionsAction::class)->run($request->all());
        return $this->respondWithSuccess(QuizSessionResource::collection($data));
    }

    public function findQuizSessionById(int $id): JsonResource
    {
        $data = app(FindQuizSessionByIdAction::class)->run($id);
        return $this->respondWithSuccess(new QuizSessionResource($data));
    }

    public function deleteQuizSession(int $id): JsonResponse
    {
        app(DeleteQuizSessionAction::class)->run($id);
        return $this->noContent();
    }

    public function createQuizSession(CreateQuizSessionRequest $request): JsonResponse
    {
        $data = app(CreateQuizSessionAction::class)->run(
            array_merge($request->validated(), [
                'user_id' => auth()->id()
            ])
        );

        return $this->respondWithSuccessCreate(new QuizSessionResource($data));
    }

    public function startQuizSession(int $id): JsonResponse
    {
        $data = app(StartQuizSessionAction::class)->run($id);
        return $this->respondWithSuccessCreate(new QuizSessionResource($data));
    }

    public function finishQuizSession(int $id): JsonResponse
    {
        $data = app(FinishQuizSessionAction::class)->run($id);
        return $this->respondWithSuccessCreate(new QuizSessionResource($data));
    }
}
