<?php

namespace App\Http\Controllers\V1\Admin;

use App\Actions\Statistics\GetQuestionStatisticByQuestionIdAction;
use App\Actions\Statistics\GetQuestionStatisticByQuizIdAction;
use App\Actions\Statistics\GetQuizStatisticByQuizIdAction;
use App\Http\Controllers\ApiController;
use App\Http\Resources\V1\Statistics\QuestionStatisticResource;
use App\Http\Resources\V1\Statistics\QuizStatisticResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class StatisticController extends ApiController
{
    public function getQuizStatisticById(Request $request, int $id): ResourceCollection
    {
        $data = app(GetQuizStatisticByQuizIdAction::class)->run($id, $request->all());
        return $this->respondWithSuccess(QuizStatisticResource::collection($data));
    }

    public function getQuestionStatisticByQuizId(Request $request, int $id): ResourceCollection
    {
        $data = app(GetQuestionStatisticByQuizIdAction::class)->run($id, $request->all());
        return $this->respondWithSuccess(QuestionStatisticResource::collection($data));
    }

    public function getQuestionStatisticByQuestionId(Request $request, int $id): ResourceCollection
    {
        $data = app(GetQuestionStatisticByQuestionIdAction::class)->run($id, $request->all());
        return $this->respondWithSuccess(QuestionStatisticResource::collection($data));
    }
}
