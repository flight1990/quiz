<?php

namespace App\Http\Controllers\V1;

use App\Actions\Quizzes\V1\CreateQuizAction;
use App\Actions\Quizzes\V1\DeleteQuizAction;
use App\Actions\Quizzes\V1\FindQuizByIdAction;
use App\Actions\Quizzes\V1\GetQuizzesAction;
use App\Actions\Quizzes\V1\UpdateQuizAction;
use App\Http\Controllers\ApiController;
use App\Http\Requests\V1\Quizzes\CreateQuizRequest;
use App\Http\Requests\V1\Quizzes\GetQuizzesRequest;
use App\Http\Requests\V1\Quizzes\UpdateQuizRequest;
use App\Http\Resources\V1\Quizzes\QuizResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class QuizController extends ApiController
{
    public function getQuizzes(GetQuizzesRequest $request): ResourceCollection|JsonResource
    {
        $data = app(GetQuizzesAction::class)->run($request->validated());
        return $this->respondWithSuccess(QuizResource::collection($data));
    }

    public function findQuizById(int $id): JsonResource
    {
        $data = app(FindQuizByIdAction::class)->run($id);
        return $this->respondWithSuccess(new QuizResource($data));
    }

    public function createQuiz(CreateQuizRequest $request): JsonResponse
    {
        $data = app(CreateQuizAction::class)->run($request->validated());
        return $this->respondWithSuccessCreate(new QuizResource($data));
    }

    public function updateQuiz(UpdateQuizRequest $request, int $id): JsonResource
    {
        $data = app(UpdateQuizAction::class)->run($request->validated(), $id);
        return $this->respondWithSuccess(new QuizResource($data));
    }

    public function deleteQuiz(int $id): JsonResponse
    {
        app(DeleteQuizAction::class)->run($id);
        return $this->noContent();
    }
}
