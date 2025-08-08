<?php

namespace App\Http\Controllers\V1\Admin;

use App\Actions\Answers\V1\DeleteAnswerAction;
use App\Actions\Answers\V1\GetAnswersAction;
use App\Http\Controllers\ApiController;
use App\Http\Resources\V1\Answers\AnswerResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AnswerController extends ApiController
{
    public function getAnswers(Request $request): ResourceCollection|JsonResource
    {
        $data = app(GetAnswersAction::class)->run($request->all());
        return $this->respondWithSuccess(AnswerResource::collection($data));
    }

    public function deleteAnswer(int $id): JsonResponse
    {
        app(DeleteAnswerAction::class)->run($id);
        return $this->noContent();
    }
}
