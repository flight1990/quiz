<?php
namespace App\Http\Controllers\V1\Admin;

use App\Actions\Media\V1\CreateMediaAction;
use App\Actions\Media\V1\DeleteMediaAction;
use App\Actions\Media\V1\GetMediaAction;
use App\Http\Controllers\ApiController;
use App\Http\Requests\V1\Media\CreateMediaRequest;
use App\Http\Resources\V1\Media\MediaResource;
use App\Http\Resources\V1\Media\MediaShortResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class MediaController extends ApiController
{
    public function getMedia(Request $request): ResourceCollection|JsonResource
    {
        $data = app(GetMediaAction::class)->run($request->all());
        return $this->respondWithSuccess(MediaShortResource::collection($data));
    }

    public function createMedia(CreateMediaRequest $request): JsonResponse
    {
        $data = app(CreateMediaAction::class)->run($request->validated());
        return $this->respondWithSuccessCreate(MediaResource::collection($data));
    }

    public function deleteMedia(int $id): JsonResponse
    {
        app(DeleteMediaAction::class)->run($id);
        return $this->noContent();
    }
}
