<?php

namespace App\Tasks\Statistics;

use App\Tasks\Task;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class GetQuestionStatisticByQuizIdTask extends Task
{
    public function run(int $quizId, array $params = []): Collection
    {
        $quizSessionId = $params['quiz_session_id'] ?? null;

        $answersWithOptions = DB::table('answer_option as ao')
            ->join('answers as a', 'a.id', '=', 'ao.answer_id')
            ->join('questions as q', 'q.id', '=', 'a.question_id')
            ->select(
                'q.id as question_id',
                'ao.option_id',
                'a.guest_user_id'
            )
            ->where('q.quiz_id', $quizId)
            ->when($quizSessionId, function ($query) use ($quizSessionId) {
                $query->where('a.quiz_session_id', $quizSessionId);
            });

        $answersOther = DB::table('answers as a')
            ->join('questions as q', 'q.id', '=', 'a.question_id')
            ->select(
                'q.id as question_id',
                DB::raw('NULL as option_id'),
                'a.guest_user_id'
            )
            ->where('q.quiz_id', $quizId)
            ->whereNotNull('a.other')
            ->where('a.other', '<>', '')
            ->when($quizSessionId, function ($query) use ($quizSessionId) {
                $query->where('a.quiz_session_id', $quizSessionId);
            });

        $union = $answersWithOptions->unionAll($answersOther);

        return DB::table(DB::raw("({$union->toSql()}) as sub"))
            ->mergeBindings($union)
            ->select(
                'question_id',
                'option_id',
                DB::raw('COUNT(DISTINCT guest_user_id) as total_users')
            )
            ->groupBy('question_id', 'option_id')
            ->orderBy('question_id')
            ->orderBy('option_id')
            ->get();
    }
}
