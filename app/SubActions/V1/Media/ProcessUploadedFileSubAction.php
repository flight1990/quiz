<?php
namespace App\SubActions\V1\Media;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ProcessUploadedFileSubAction
{
    public function run($file): array
    {
        $uuid = Str::uuid();
        $disk = 'public';
        $mime = $file->getMimeType();
        $originalName = $file->getClientOriginalName();

        if (str_starts_with($mime, 'image/')) {
            $manager = new ImageManager(new Driver());

            $image = $manager->read($file->getRealPath())->toWebp(75);
            $path = "media/{$uuid}.webp";

            Storage::disk($disk)->put($path, (string) $image);

            $mime = 'image/webp';
            $extension = 'webp';
        } else {
            $extension = $file->getClientOriginalExtension();
            $path = "media/{$uuid}.{$extension}";

            Storage::disk($disk)->putFileAs('media',$file,"{$uuid}.{$extension}");
        }

        $size = Storage::disk($disk)->size($path);

        return [
            'uuid' => $uuid,
            'disk' => $disk,
            'path' => $path,
            'original_name' => $originalName,
            'mime_type' => $mime,
            'extension' => $extension,
            'size' => $size,
        ];
    }
}
