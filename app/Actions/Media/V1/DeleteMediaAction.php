<?php

namespace App\Actions\Media\V1;

use App\Actions\Action;
use App\Tasks\Media\V1\DeleteMediaTask;
use App\Tasks\Media\V1\FindMediaByIdTask;
use Illuminate\Support\Facades\Storage;

class DeleteMediaAction extends Action
{
    public function run(int $id): int
    {
        $media = app(FindMediaByIdTask::class)->run($id);
        Storage::disk($media->disk)->delete($media->path);

        return app(DeleteMediaTask::class)->run($id);
    }
}
