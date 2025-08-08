<?php

namespace App\Http\Controllers\V1\Guest;

use App\Actions\Answers\V1\CreateAnswerAction;
use App\Actions\Answers\V1\CreateBulkAnswersAction;
use App\Http\Controllers\ApiController;
use App\Http\Requests\V1\Answers\CreateAnswerRequest;
use App\Http\Requests\V1\Answers\CreateBulkAnswersRequest;
use App\Http\Resources\V1\Answers\AnswerResource;
use Illuminate\Http\JsonResponse;

class AnswerController extends ApiController
{
    public function createAnswer(CreateAnswerRequest $request): JsonResponse
    {
        $data = app(CreateAnswerAction::class)->run($request->validated());
        return $this->respondWithSuccessCreate(new AnswerResource($data));
    }

    public function createBulkAnswers(CreateBulkAnswersRequest $request): JsonResponse
    {
        app(CreateBulkAnswersAction::class)->run($request->get('answers'));
        return $this->noContent();
    }
}
