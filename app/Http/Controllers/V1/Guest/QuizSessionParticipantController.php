<?php

namespace App\Http\Controllers\V1\Guest;

use App\Actions\QuizSessions\V1\CreateQuizSessionAction;
use App\Actions\QuizSessions\V1\DeleteQuizSessionAction;
use App\Actions\QuizSessions\V1\FindQuizSessionByIdAction;
use App\Actions\QuizSessions\V1\FinishQuizSessionAction;
use App\Actions\QuizSessions\V1\GetQuizSessionsAction;
use App\Actions\QuizSessions\V1\StartQuizSessionAction;
use App\Http\Controllers\ApiController;
use App\Http\Requests\V1\QuizSession\CreateQuizSessionRequest;
use App\Http\Resources\V1\QuizSessions\QuizSessionResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class QuizSessionParticipantController extends ApiController
{
    public function joinParticipant()
    {
        dd('joinParticipant');
    }

    public function leftParticipant()
    {
        dd('leftParticipant');
    }
}
