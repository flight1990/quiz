<?php

namespace App\Http\Controllers\V1\Guest;

use App\Actions\Quizzes\V1\FindQuizByIdAction;
use App\Actions\Quizzes\V1\FindQuizBySlugAction;
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
        $guest = auth('guest-api')->user();

        $data = app(GetQuizzesAction::class)->run([
            'is_active' => true,
            'is_anonymous' => $guest['unit_id'] ? null : true,
        ]);

        return $this->respondWithSuccess(QuizResource::collection($data));
    }

    public function findQuizById(int $id): JsonResource
    {
        $guest = auth('guest-api')->user();

        $data = app(FindQuizByIdAction::class)->run($id, [
            'is_active' => true,
            'is_anonymous' => $guest['unit_id'] ? null : true,
        ]);

        return $this->respondWithSuccess(new QuizResource($data));
    }

    public function findQuizBySlug(string $slug): JsonResource
    {
        $data = app(FindQuizBySlugAction::class)->run($slug);
        return $this->respondWithSuccess(new QuizResource($data));
    }
}
