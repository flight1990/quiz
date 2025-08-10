<?php

namespace App\Http\Controllers\V1\Guest;

use App\Actions\Answers\V1\CreateAnswerAction;
use App\Actions\Answers\V1\CreateBulkAnswersAction;
use App\Actions\Answers\V1\GetAnswersAction;
use App\Http\Controllers\ApiController;
use App\Http\Requests\V1\Answers\CreateAnswerRequest;
use App\Http\Resources\V1\Answers\AnswerResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AnswerController extends ApiController
{
    public function getAnswers(Request $request): ResourceCollection|JsonResource
    {
        $params = $request->all();
        $params['guest_user_id'] = auth('guest-api')->id();

        $data = app(GetAnswersAction::class)->run($params);
        return $this->respondWithSuccess(AnswerResource::collection($data));
    }

    public function createAnswer(CreateAnswerRequest $request): JsonResponse
    {
        $data = app(CreateAnswerAction::class)->run($request->validated());
        return $this->respondWithSuccessCreate(new AnswerResource($data));
    }

    public function createBulkAnswers(CreateAnswerRequest $request): JsonResponse
    {
        app(CreateBulkAnswersAction::class)->run($request->get('answers'));
        return $this->noContent();
    }
}
