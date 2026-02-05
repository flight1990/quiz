<?php

namespace App\Actions\Answers\V1;

use App\Actions\Action;
use App\Data\Criterias\WhereFieldCriteria;
use App\Data\Criterias\WhereInFieldCriteria;
use App\Tasks\Answers\V1\GetAnswersTask;
use App\Tasks\Questions\V1\GetQuestionsTask;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class GetAnswersAction extends Action
{
    public function run(?array $params): Collection
    {
        $task = app(GetAnswersTask::class);

        if (isset($params['guest_user_id'])) {
            $task->pushCriteria(new WhereFieldCriteria('guest_user_id', $params['guest_user_id']));
        }

        if (isset($params['quiz_session_id'])) {
            $task->pushCriteria(new WhereFieldCriteria('quiz_session_id', $params['quiz_session_id']));
        }

        if (isset($params['question_id'])) {
            $task->pushCriteria(new WhereFieldCriteria('question_id', $params['question_id']));
        }

        if (isset($params['quiz_id'])) {
            $questions = app(GetQuestionsTask::class)->pushCriteria(new WhereInFieldCriteria('quiz_id', [$params['quiz_id']]))->run();
            $questionsIds = Arr::pluck($questions, 'id');
            $task->pushCriteria(new WhereInFieldCriteria('question_id', $questionsIds));
        }

        return $task->run();
    }
}
