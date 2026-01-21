<?php

namespace App\Http\Controllers\V1\Guest;

use App\Actions\QuizSessionParticipants\V1\JoinQuizSessionParticipantAction;
use App\Actions\QuizSessionParticipants\V1\LeaveQuizSessionParticipantAction;
use App\Http\Controllers\ApiController;
use App\Http\Requests\V1\QuizSessionParticipants\SetQuizSessionParticipantRequest;
use App\Http\Resources\V1\QuizSessions\QuizSessionParticipantResource;
use Illuminate\Http\Resources\Json\JsonResource;

class QuizSessionParticipantController extends ApiController
{
    public function joinParticipant(SetQuizSessionParticipantRequest $request): JsonResource
    {
        $data = app(JoinQuizSessionParticipantAction::class)->run($request->validated());
        return $this->respondWithSuccess(new QuizSessionParticipantResource($data));
    }

    public function leaveParticipant(SetQuizSessionParticipantRequest $request): JsonResource
    {
        $data = app(LeaveQuizSessionParticipantAction::class)->run($request->validated());
        return $this->respondWithSuccess(new QuizSessionParticipantResource($data));
    }
}
