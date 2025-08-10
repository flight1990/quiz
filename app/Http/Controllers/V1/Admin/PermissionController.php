<?php
namespace App\Http\Controllers\V1\Admin;

use App\Http\Controllers\ApiController;
use App\Http\Resources\V1\Roles\PermissionResource;
use App\Tasks\Permissions\V1\GetPermissionsTask;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PermissionController extends ApiController
{
    public function getPermissions(Request $request): ResourceCollection|JsonResource
    {
        $data = app(GetPermissionsTask::class)->run();
        return $this->respondWithSuccess(PermissionResource::collection($data));
    }
}
