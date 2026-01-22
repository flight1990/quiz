<?php

namespace App\Http\Controllers\V1\Guest;

use App\Actions\QuizSessions\V1\FindQuizSessionByIdAction;
use App\Http\Controllers\ApiController;
use App\Http\Resources\V1\QuizSessions\QuizSessionResource;
use Illuminate\Http\Resources\Json\JsonResource;

class QuizSessionController extends ApiController
{
    public function findSessionById(int $id): JsonResource
    {
        $data = app(FindQuizSessionByIdAction::class)->run($id);
        return $this->respondWithSuccess(new QuizSessionResource($data));
    }
}
