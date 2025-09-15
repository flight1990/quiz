<?php

namespace App\Tasks\Statistics;

use App\Tasks\Task;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class GetQuestionStatisticByQuizIdTask extends Task
{
    public function run(int $quizId): Collection
    {
        $answersWithOptions = DB::table('answer_option as ao')
            ->join('answers as a', 'a.id', '=', 'ao.answer_id')
            ->join('questions as q', 'q.id', '=', 'a.question_id')
            ->select(
                'q.id as question_id',
                'ao.option_id',
                'a.guest_user_id'
            )
            ->where('q.quiz_id', $quizId);

        $answersOther = DB::table('answers as a')
            ->join('questions as q', 'q.id', '=', 'a.question_id')
            ->select(
                'q.id as question_id',
                DB::raw('NULL as option_id'),
                'a.guest_user_id'
            )
            ->where('q.quiz_id', $quizId)
            ->whereNotNull('a.other')
            ->where('a.other', '<>', '');

        $union = $answersWithOptions->unionAll($answersOther);

        return DB::table(DB::raw("({$union->toSql()}) as sub"))
            ->mergeBindings($union)
            ->select('question_id', 'option_id', DB::raw('COUNT(DISTINCT guest_user_id) as total_users'))
            ->groupBy('question_id', 'option_id')
            ->orderBy('question_id')
            ->orderBy('option_id')
            ->get();
    }
}
