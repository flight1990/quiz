<?php

namespace App\Actions\Media\V1;

use App\Actions\Action;
use App\SubActions\V1\Media\ProcessUploadedFileSubAction;
use App\Tasks\Media\V1\CreateMediaTask;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Prettus\Validator\Exceptions\ValidatorException;

class CreateMediaAction extends Action
{
    /**
     * @throws ValidatorException
     * @throws \Throwable
     */
    public function run(array $payload): Collection
    {
        $files = $payload['files'] ?? [];
        $mediaCollection = collect();

        DB::beginTransaction();

        try {
            foreach ($files as $file) {
                $data = app(ProcessUploadedFileSubAction::class)->run($file);
                $media = app(CreateMediaTask::class)->run($data);

                $mediaCollection->push($media);
            }

            DB::commit();
            return $mediaCollection;

        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
