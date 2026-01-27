<?php

namespace App\Http\Controllers\V1\Admin;

use App\Actions\QuizSessionParticipants\V1\DeleteQuizSessionParticipantAction;
use App\Actions\QuizSessionParticipants\V1\FindQuizSessionParticipantByIdAction;
use App\Actions\QuizSessionParticipants\V1\GetQuizSessionParticipantsAction;
use App\Http\Controllers\ApiController;
use App\Http\Resources\V1\QuizSessions\QuizSessionParticipantResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class QuizSessionParticipantController extends ApiController
{
    public function getParticipants(Request $request): ResourceCollection|JsonResource
    {
        $data = app(GetQuizSessionParticipantsAction::class)->run($request->all());
        return $this->respondWithSuccess(QuizSessionParticipantResource::collection($data));
    }

    public function findParticipantById(int $id): JsonResource
    {
        $data = app(FindQuizSessionParticipantByIdAction::class)->run($id);
        return $this->respondWithSuccess(new QuizSessionParticipantResource($data));
    }

    public function deleteParticipant(int $id): JsonResponse
    {
        app(DeleteQuizSessionParticipantAction::class)->run($id);
        return $this->noContent();
    }
}
