<?php

namespace App\Http\Resources\V1\QuizSessions;

use App\Http\Resources\V1\Answers\AnswerResource;
use App\Http\Resources\V1\Questions\QuestionResource;
use App\Http\Resources\V1\Quizzes\QuizResource;
use App\Http\Resources\V1\Users\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuizSessionResource extends JsonResource
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
            'quiz_id' => $this->whenHas('quiz_id'),
            'current_question_id' => $this->whenHas('current_question_id'),
            'user_id' => $this->whenHas('user_id'),
            'created_at' => $this->whenHas('created_at'),
            'started_at' => $this->whenHas('started_at'),
            'finished_at' => $this->whenHas('finished_at'),
            'quiz' => new QuizResource($this->whenLoaded('quiz')),
            'user' => new UserResource($this->whenLoaded('user')),
            'current_question' => new QuestionResource($this->whenLoaded('currentQuestion')),
            'participants' => QuizSessionParticipantResource::collection($this->whenLoaded('participants')),
            'answers' => AnswerResource::collection($this->whenLoaded('answers')),
            'questionLogs' => QuizSessionQuestionLogResource::collection($this->whenLoaded('questionLogs')),
        ];
    }
}
