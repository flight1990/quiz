<?php

namespace App\Actions\Media\V1;

use App\Actions\Action;
use App\Tasks\Media\V1\DeleteMediaTask;
use App\Tasks\Media\V1\FindMediaByIdTask;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class DeleteMediaAction extends Action
{
    /**
     * @throws ValidationException
     */
    public function run(int $id): int
    {
        $media = app(FindMediaByIdTask::class)->run($id);

        $usageExists = DB::table('mediables')
            ->where('media_id', $id)
            ->exists();

        if ($usageExists) {
            throw ValidationException::withMessages([
                'media' => ['The file is in use and cannot be deleted']
            ]);
        }

        Storage::disk($media->disk)->delete($media->path);

        return app(DeleteMediaTask::class)->run($id);
    }
}
