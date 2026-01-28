<?php

namespace App\Tasks\Statistics;

use App\Tasks\Task;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class GetQuizStatisticByQuizIdTask extends Task
{
    public function run(int $quizId, array $params = []): Collection
    {
        $query = DB::table('answers as a')
            ->join('guest_users as gu', 'gu.id', '=', 'a.guest_user_id')
            ->join('questions as q', 'q.id', '=', 'a.question_id')
            ->join('quizzes as quiz', 'quiz.id', '=', 'q.quiz_id')
            ->leftJoin('units as u', 'u.id', '=', 'gu.unit_id')
            ->select(
                'quiz.id as quiz_id',
                'gu.unit_id',
                'u.name as unit_name',
                DB::raw('COUNT(DISTINCT gu.id) as total_users')
            )
            ->where('quiz.id', $quizId);

        if (isset($params['quiz_session_id'])) {
            $query->where('a.quiz_session_id', $params['quiz_session_id']);
        }

        return $query
            ->groupBy('quiz.id', 'gu.unit_id', 'u.name')
            ->orderBy('gu.unit_id')
            ->get();

    }
}
