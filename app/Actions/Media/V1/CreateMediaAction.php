<?php

namespace App\Actions\Media\V1;

use App\Actions\Action;
use App\Tasks\Media\V1\CreateMediaTask;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
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
                $path = $file->store('media', 'public');

                $media = app(CreateMediaTask::class)->run([
                    'uuid' => Str::uuid(),
                    'disk' => 'public',
                    'path' => $path,
                    'original_name' => $file->getClientOriginalName(),
                    'mime_type' => $file->getMimeType(),
                    'extension' => $file->getClientOriginalExtension(),
                    'size' => $file->getSize(),
                ]);

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
