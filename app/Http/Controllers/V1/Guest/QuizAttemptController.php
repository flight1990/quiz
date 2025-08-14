<?php

namespace App\Http\Controllers\V1\Guest;

use App\Actions\QuizAttempts\V1\GetQuizAttemptsAction;
use App\Http\Controllers\ApiController;
use App\Http\Resources\V1\QuizAttempts\QuizAttemptResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class QuizAttemptController extends ApiController
{
    public function getQuizAttempts(Request $request): ResourceCollection|JsonResource
    {
        $params = $request->all();
        $params['guest_user_id'] = auth('guest-api')->id();

        $data = app(GetQuizAttemptsAction::class)->run($params);
        return $this->respondWithSuccess(QuizAttemptResource::collection($data));
    }
}
