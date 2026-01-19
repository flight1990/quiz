<?php

namespace App\Http\Controllers\V1\Admin;

use App\Actions\QuestionAttends\V1\GetQuestionAttendAction;
use App\Http\Controllers\ApiController;
use App\Http\Resources\V1\QuestionAttends\QuestionAttendResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class QuestionAttendController extends ApiController
{
    public function getQuestionAttends(Request $request): ResourceCollection|JsonResource
    {
        $data = app(GetQuestionAttendAction::class)->run($request->all());
        return $this->respondWithSuccess(QuestionAttendResource::collection($data));
    }
}
