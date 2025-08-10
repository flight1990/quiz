<?php

namespace App\Http\Controllers\V1\Guest;

use App\Actions\Units\V1\GetUnitsAction;
use App\Http\Controllers\ApiController;
use App\Http\Resources\V1\Units\UnitResource;
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
}
