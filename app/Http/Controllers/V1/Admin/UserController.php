<?php
namespace App\Http\Controllers\V1\Admin;

use App\Actions\Users\V1\CreateUserAction;
use App\Actions\Users\V1\DeleteUserAction;
use App\Actions\Users\V1\FindUserByIdAction;
use App\Actions\Users\V1\GetUsersAction;
use App\Actions\Users\V1\UpdateUserAction;
use App\Http\Controllers\ApiController;
use App\Http\Requests\V1\Users\CreateUserRequest;
use App\Http\Requests\V1\Users\UpdateUserRequest;
use App\Http\Resources\V1\Users\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserController extends ApiController
{
    public function getUsers(Request $request): ResourceCollection|JsonResource
    {
        $data = app(GetUsersAction::class)->run($request->all());
        return $this->respondWithSuccess(UserResource::collection($data));
    }

    public function findUserById(int $id): JsonResource
    {
        $data = app(FindUserByIdAction::class)->run($id);
        return $this->respondWithSuccess(new UserResource($data));
    }

    public function createUser(CreateUserRequest $request): JsonResponse
    {
        $data = app(CreateUserAction::class)->run($request->validated());
        return $this->respondWithSuccessCreate(new UserResource($data));
    }

    public function updateUser(UpdateUserRequest $request, int $id): JsonResource
    {
        $data = app(UpdateUserAction::class)->run($request->validated(), $id);
        return $this->respondWithSuccess(new UserResource($data));
    }

    public function deleteUser(int $id): JsonResponse
    {
        app(DeleteUserAction::class)->run($id);
        return $this->noContent();
    }
}
