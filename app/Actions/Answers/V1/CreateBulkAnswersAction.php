<?php

namespace App\Actions\Answers\V1;

use App\Actions\Action;
use App\Tasks\Answers\V1\CreateAnswerTask;
use Illuminate\Support\Facades\DB;

class CreateBulkAnswersAction extends Action
{
    public function run(array $payload): void
    {
        DB::transaction(function () use ($payload) {
            foreach ($payload as $data) {
                app(CreateAnswerTask::class)->run($data);
            }
        });
    }
}
