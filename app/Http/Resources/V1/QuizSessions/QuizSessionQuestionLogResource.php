<?php

namespace App\Http\Resources\V1\QuizSessions;

use App\Http\Resources\V1\GuestUsers\GuestUserResource;
use App\Http\Resources\V1\Options\OptionResource;
use App\Http\Resources\V1\Questions\QuestionResource;
use App\Http\Resources\V1\Quizzes\QuizResource;
use App\Http\Resources\V1\Users\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuizSessionQuestionLogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->whenHas('id'),
            'quiz_session_id' => $this->whenHas('quiz_session_id'),
            'question_id' => $this->whenHas('question_id'),
            'status' => $this->whenHas('status'),
            'datetime' => $this->whenHas('datetime'),
        ];
    }
}
