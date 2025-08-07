<?php

namespace App\Http\Controllers\V1\Admin;

use App\Actions\Units\V1\CreateUnitAction;
use App\Actions\Units\V1\DeleteUnitAction;
use App\Actions\Units\V1\FindUnitByIdAction;
use App\Actions\Units\V1\GetUnitsAction;
use App\Actions\Units\V1\UpdateUnitAction;
use App\Http\Controllers\ApiController;
use App\Http\Requests\V1\Units\CreateUnitRequest;
use App\Http\Requests\V1\Units\UpdateUnitRequest;
use App\Http\Resources\V1\Units\UnitResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UnitController extends ApiController
{
    public function getUnits(Request $request): ResourceCollection|JsonResource
    {
        $data = app(GetUnitsAction::class)->run($request->all());
        return $this->respondWithSuccess(UnitResource::collection($data));
    }

    public function findUnitById(int $id): JsonResource
    {
        $data = app(FindUnitByIdAction::class)->run($id);
        return $this->respondWithSuccess(new UnitResource($data));
    }

    public function createUnit(CreateUnitRequest $request): JsonResponse
    {
        $data = app(CreateUnitAction::class)->run($request->validated());
        return $this->respondWithSuccessCreate(new UnitResource($data));
    }

    public function updateUnit(UpdateUnitRequest $request, int $id): JsonResource
    {
        $data = app(UpdateUnitAction::class)->run($request->validated(), $id);
        return $this->respondWithSuccess(new UnitResource($data));
    }

    public function deleteUnit(int $id): JsonResponse
    {
        app(DeleteUnitAction::class)->run($id);
        return $this->noContent();
    }
}
