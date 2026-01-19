<?php

namespace App\Http\Controllers\V1\Guest;

use App\Actions\QuestionAttends\V1\CreateQuestionAttendAction;
use App\Http\Controllers\ApiController;
use App\Http\Requests\V1\QuestionAttends\CreateQuestionAttendRequest;
use App\Http\Resources\V1\QuestionAttends\QuestionAttendResource;
use Illuminate\Http\JsonResponse;

class QuestionAttendController extends ApiController
{
    public function createQuestionAttend(CreateQuestionAttendRequest $request): JsonResponse
    {
        $data = app(CreateQuestionAttendAction::class)->run($request->all());
        return $this->respondWithSuccessCreate(new QuestionAttendResource($data));
    }
}
