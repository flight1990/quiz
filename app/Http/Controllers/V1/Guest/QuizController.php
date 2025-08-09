<?php

namespace App\Http\Controllers\V1\Guest;

use App\Actions\Quizzes\V1\GetQuizzesAction;
use App\Http\Controllers\ApiController;
use App\Http\Resources\V1\Quizzes\QuizResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class QuizController extends ApiController
{
    public function getQuizzes(Request $request): ResourceCollection|JsonResource
    {
        $data = app(GetQuizzesAction::class)->run([
            'is_active' => true,
        ]);

        return $this->respondWithSuccess(QuizResource::collection($data));
    }
}
