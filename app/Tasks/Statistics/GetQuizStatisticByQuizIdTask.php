<?php

namespace App\Tasks\Statistics;

use App\Tasks\Task;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class GetQuizStatisticByQuizIdTask extends Task
{
    public function run(int $quizId): Collection
    {
        return DB::table('answers as a')
            ->join('guest_users as gu', 'gu.id', '=', 'a.guest_user_id')
            ->join('questions as q', 'q.id', '=', 'a.question_id')
            ->join('quizzes as quiz', 'quiz.id', '=', 'q.quiz_id')
            ->select(
                'quiz.id as quiz_id',
                'gu.unit_id',
                DB::raw('COUNT(DISTINCT gu.id) as total_users')
            )
            ->where('quiz.id', $quizId)
            ->groupBy('quiz.id', 'gu.unit_id')
            ->orderBy('gu.unit_id')
            ->get();
    }
}
