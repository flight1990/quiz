<?php

namespace App\Http\Controllers\V1\Admin;

use App\Actions\QuizSessionQuestionLogs\V1\DeleteQuizSessionQuestionLogAction;
use App\Actions\QuizSessionQuestionLogs\V1\FindQuizSessionQuestionLogByIdAction;
use App\Actions\QuizSessionQuestionLogs\V1\FinishQuizSessionQuestionLogAction;
use App\Actions\QuizSessionQuestionLogs\V1\GetQuizSessionQuestionLogsAction;
use App\Actions\QuizSessionQuestionLogs\V1\SetQuizSessionQuestionLogAction;
use App\Actions\QuizSessionQuestionLogs\V1\SkipQuizSessionQuestionLogAction;
use App\Http\Controllers\ApiController;
use App\Http\Requests\V1\QuizSessionQuestionLogs\SetQuizSessionQuestionLogRequest;
use App\Http\Resources\V1\QuizSessions\QuizSessionQuestionLogResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class QuizSessionQuestionController extends ApiController
{
    public function getQuestions(): ResourceCollection|JsonResource
    {
        $data = app(GetQuizSessionQuestionLogsAction::class)->run();
        return $this->respondWithSuccess(QuizSessionQuestionLogResource::collection($data));
    }

    public function findQuestionById(int $id): JsonResource
    {
        $data = app(FindQuizSessionQuestionLogByIdAction::class)->run($id);
        return $this->respondWithSuccess(new QuizSessionQuestionLogResource($data));
    }

    public function deleteQuestion(int $id): JsonResponse
    {
        app(DeleteQuizSessionQuestionLogAction::class)->run($id);
        return $this->noContent();
    }

    public function setQuestion(SetQuizSessionQuestionLogRequest $request, int $sessionId): JsonResource
    {
        $data = app(SetQuizSessionQuestionLogAction::class)->run(array_merge(
            $request->validated(),
            ['session_id' => $sessionId]
        ));

        return $this->respondWithSuccess(new QuizSessionQuestionLogResource($data));
    }

    public function skipQuestion(SetQuizSessionQuestionLogRequest $request, int $sessionId): JsonResource
    {
        $data = app(SkipQuizSessionQuestionLogAction::class)->run(array_merge(
            $request->validated(),
            ['session_id' => $sessionId]
        ));

        return $this->respondWithSuccess(new QuizSessionQuestionLogResource($data));
    }


    public function finishQuestion(SetQuizSessionQuestionLogRequest $request, int $sessionId): JsonResource
    {
        $data = app(FinishQuizSessionQuestionLogAction::class)->run(array_merge(
            $request->validated(),
            ['session_id' => $sessionId]
        ));

        return $this->respondWithSuccess(new QuizSessionQuestionLogResource($data));
    }
}
