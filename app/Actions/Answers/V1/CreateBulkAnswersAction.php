<?php

namespace App\Actions\Answers\V1;

use App\Actions\Action;
use App\SubActions\V1\Answers\CreateAnswerSubAction;
use Illuminate\Support\Facades\DB;

class CreateBulkAnswersAction extends Action
{
    public function run(array $payload): void
    {
        DB::transaction(function () use ($payload) {
            foreach ($payload as $data) {
                app(CreateAnswerSubAction::class)->run($data);
            }
        });
    }
}
