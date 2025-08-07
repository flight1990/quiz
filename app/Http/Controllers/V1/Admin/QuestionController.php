<?php

namespace App\Http\Controllers\V1\Admin;

use App\Actions\Questions\V1\CreateQuestionAction;
use App\Actions\Questions\V1\DeleteQuestionAction;
use App\Actions\Questions\V1\FindQuestionByIdAction;
use App\Actions\Questions\V1\GetQuestionsAction;
use App\Actions\Questions\V1\UpdateQuestionAction;
use App\Http\Controllers\ApiController;
use App\Http\Requests\V1\Questions\CreateQuestionRequest;
use App\Http\Requests\V1\Questions\UpdateQuestionRequest;
use App\Http\Resources\V1\Questions\QuestionResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class QuestionController extends ApiController
{
    public function getQuestions(Request $request): ResourceCollection|JsonResource
    {
        $data = app(GetQuestionsAction::class)->run($request->all());
        return $this->respondWithSuccess(QuestionResource::collection($data));
    }

    public function findQuestionById(int $id): JsonResource
    {
        $data = app(FindQuestionByIdAction::class)->run($id);
        return $this->respondWithSuccess(new QuestionResource($data));
    }

    public function createQuestion(CreateQuestionRequest $request): JsonResponse
    {
        $data = app(CreateQuestionAction::class)->run($request->validated());
        return $this->respondWithSuccessCreate(new QuestionResource($data));
    }

    public function updateQuestion(UpdateQuestionRequest $request, int $id): JsonResource
    {
        $data = app(UpdateQuestionAction::class)->run($request->validated(), $id);
        return $this->respondWithSuccess(new QuestionResource($data));
    }

    public function deleteQuestion(int $id): JsonResponse
    {
        app(DeleteQuestionAction::class)->run($id);
        return $this->noContent();
    }
}
