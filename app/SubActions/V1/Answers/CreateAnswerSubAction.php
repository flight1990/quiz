<?php

namespace App\SubActions\V1\Answers;

use App\Models\Answer;
use App\Tasks\Answers\V1\CreateAnswerTask;
use App\Tasks\Answers\V1\GetAnsweredQuestionsCountByAttemptIdTask;
use App\Tasks\Options\V1\GetCorrectOptionsByQuestionIdTask;
use App\Tasks\Questions\V1\FindQuestionByIdTask;
use App\Tasks\QuizAttempts\CreateQuizAttemptTask;
use App\Tasks\QuizAttempts\FindUnfinishedQuizAttemptTask;
use Prettus\Validator\Exceptions\ValidatorException;

class CreateAnswerSubAction
{
    /**
     * @throws ValidatorException
     */
    public function run(array $payload): Answer
    {

        $guestId = auth('guest-api')->id();
        $payload['guest_user_id'] = $guestId;

        $question = app(FindQuestionByIdTask::class)->run($payload['question_id']);
        $quizId = $question['quiz_id'];

        $attempt = app(FindUnfinishedQuizAttemptTask::class)->run($guestId, $quizId);

        if (!$attempt) {
            $attempt = app(CreateQuizAttemptTask::class)->run([
                'quiz_id'       => $quizId,
                'guest_user_id' => $guestId,
                'status'        => 'started',
                'started_at'    => now(),
            ]);
        }

        $payload['attempt_id'] = $attempt['id'];
        $answer = app(CreateAnswerTask::class)->run($payload);
        $isCorrect = false;

        if (!empty($payload['options'])) {
            $answer->options()->sync($payload['options']);

            $correctOptionIds = app(GetCorrectOptionsByQuestionIdTask::class)
                ->run($answer->question_id);
            $selectedOptionIds = $payload['options'];

            sort($correctOptionIds);
            sort($selectedOptionIds);

            $isCorrect = ($correctOptionIds === $selectedOptionIds);
        }
        elseif (!empty($payload['other'])) {
            $isCorrect = true;
        }

        $answer->is_correct = $isCorrect;
        $answer->save();

        $totalQuestions = $question->quiz->questions()->count();

        $answeredQuestions = app(GetAnsweredQuestionsCountByAttemptIdTask::class)->run($attempt['id']);

        if ($answeredQuestions >= $totalQuestions) {
            $attempt->status = 'completed';
            $attempt->completed_at = now();
            $attempt->save();
        }

        return $answer;
    }
}
