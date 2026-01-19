<?php

namespace App\Actions\QuestionAttends\V1;

use App\Actions\Action;
use App\Models\QuestionAttend;
use App\Tasks\QuestionAttends\V1\CreateQuestionAttendTask;
use App\Tasks\QuestionAttends\V1\GetLastAttemptTask;
use App\Tasks\QuestionAttends\V1\GetLatestQuestionAttendTask;
use App\Tasks\QuestionAttendStatues\V1\CreateQuestionAttendStatusTask;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class CreateQuestionAttendAction extends Action
{
    public function run(array $payload): QuestionAttend
    {
        $payload['guest_user_id'] = auth('guest-api')->id();

        return DB::transaction(function () use ($payload) {
            $status = trim($payload['status']);

            if ($status === 'started') {
                $lastAttempt = app(GetLastAttemptTask::class)->run($payload['question_id'], $payload['guest_user_id']);
                $attempt = $lastAttempt ? $lastAttempt + 1 : 1;

                $questionAttend = app(CreateQuestionAttendTask::class)->run([
                    'question_id' => $payload['question_id'],
                    'guest_user_id' => $payload['guest_user_id'],
                    'attempt' => $attempt,
                ]);
            } else {
                $questionAttend = app(GetLatestQuestionAttendTask::class)->run($payload['question_id'], $payload['guest_user_id']);

                if (!$questionAttend)
                    $questionAttend = app(CreateQuestionAttendTask::class)->run([
                        'question_id' => $payload['question_id'],
                        'guest_user_id' => $payload['guest_user_id'],
                        'attempt' => 1,
                    ]);

            }

            $statusExists = $questionAttend?->statuses()
                ->where('status', $status)
                ->exists();

            if ($statusExists) {
                throw ValidationException::withMessages([
                    'status' => ['This status already exists for this attempt']
                ]);
            }

            app(CreateQuestionAttendStatusTask::class)->run([
                'question_attend_id' => $questionAttend->id,
                'status' => $status,
            ]);

            return $questionAttend;
        });
    }
}
