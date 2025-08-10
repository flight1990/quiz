<?php
namespace App\Http\Controllers\V1\Admin;

use App\Actions\Roles\V1\CreateRoleAction;
use App\Actions\Roles\V1\DeleteRoleAction;
use App\Actions\Roles\V1\FindRoleByIdAction;
use App\Actions\Roles\V1\GetRolesAction;
use App\Actions\Roles\V1\UpdateRoleAction;
use App\Http\Controllers\ApiController;
use App\Http\Requests\V1\Roles\CreateRoleRequest;
use App\Http\Requests\V1\Roles\UpdateRoleRequest;
use App\Http\Resources\V1\Roles\RoleResource;
use App\Http\Resources\V1\Users\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class RoleController extends ApiController
{
    public function getRoles(Request $request): ResourceCollection|JsonResource
    {
        $data = app(GetRolesAction::class)->run($request->all());
        return $this->respondWithSuccess(RoleResource::collection($data));
    }

    public function findRoleById(int $id): JsonResource
    {
        $data = app(FindRoleByIdAction::class)->run($id);
        return $this->respondWithSuccess(new RoleResource($data));
    }

    public function createRole(CreateRoleRequest $request): JsonResponse
    {
        $data = app(CreateRoleAction::class)->run($request->validated());
        return $this->respondWithSuccessCreate(new RoleResource($data));
    }

    public function updateRole(UpdateRoleRequest $request, int $id): JsonResource
    {
        $data = app(UpdateRoleAction::class)->run($request->validated(), $id);
        return $this->respondWithSuccess(new RoleResource($data));
    }

    public function deleteRole(int $id): JsonResponse
    {
        app(DeleteRoleAction::class)->run($id);
        return $this->noContent();
    }
}
