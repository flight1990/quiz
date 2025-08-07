<?php

namespace App\Http\Controllers\V1\Admin;

use App\Actions\Options\V1\DeleteOptionAction;
use App\Actions\Options\V1\FindOptionByIdAction;
use App\Actions\Options\V1\GetOptionsAction;
use App\Actions\Options\V1\UpdateOptionAction;
use App\Http\Controllers\ApiController;
use App\Http\Requests\V1\Options\CreateOptionRequest;
use App\Http\Requests\V1\Options\UpdateOptionRequest;
use App\Http\Resources\V1\Options\OptionResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class OptionController extends ApiController
{
    public function getOptions(Request $request): ResourceCollection|JsonResource
    {
        $data = app(GetOptionsAction::class)->run($request->all());
        return $this->respondWithSuccess(OptionResource::collection($data));
    }

    public function findOptionById(int $id): JsonResource
    {
        $data = app(FindOptionByIdAction::class)->run($id);
        return $this->respondWithSuccess(new OptionResource($data));
    }

    public function createOption(CreateOptionRequest $request): JsonResponse
    {
        $data = app(CreateOptionRequest::class)->run($request->validated());
        return $this->respondWithSuccessCreate(new OptionResource($data));
    }

    public function updateOption(UpdateOptionRequest $request, int $id): JsonResource
    {
        $data = app(UpdateOptionAction::class)->run($request->validated(), $id);
        return $this->respondWithSuccess(new OptionResource($data));
    }

    public function deleteOption(int $id): JsonResponse
    {
        app(DeleteOptionAction::class)->run($id);
        return $this->noContent();
    }
}
