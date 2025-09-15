<?php

namespace App\Http\Controllers\V1\Admin;

use App\Actions\Statistics\GetQuestionStatisticByQuizIdAction;
use App\Actions\Statistics\GetQuizStatisticByQuizIdAction;
use App\Http\Controllers\ApiController;
use App\Http\Resources\V1\Statistics\QuestionStatisticResource;
use App\Http\Resources\V1\Statistics\QuizStatisticResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class StatisticController extends ApiController
{
    public function getQuizStatisticByQuizId(int $id): ResourceCollection
    {
        $data = app(GetQuizStatisticByQuizIdAction::class)->run($id);
        return $this->respondWithSuccess(QuizStatisticResource::collection($data));
    }

    public function getQuestionStatisticByQuizId(int $id): ResourceCollection
    {
        $data = app(GetQuestionStatisticByQuizIdAction::class)->run($id);
        return $this->respondWithSuccess(QuestionStatisticResource::collection($data));
    }
}
