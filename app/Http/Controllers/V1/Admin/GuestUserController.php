<?php
namespace App\Http\Controllers\V1\Admin;

use App\Actions\GuestUsers\V1\DeleteGuestUserAction;
use App\Actions\GuestUsers\V1\FindGuestUserByIdAction;
use App\Actions\GuestUsers\V1\GetGuestUsersAction;
use App\Actions\GuestUsers\V1\UpdateGuestUserAction;
use App\Http\Controllers\ApiController;
use App\Http\Requests\V1\GuestUsers\UpdateGuestUserRequest;
use App\Http\Resources\V1\GuestUsers\GuestUserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class GuestUserController extends ApiController
{
    public function getGuestUsers(Request $request): ResourceCollection|JsonResource
    {
        $data = app(GetGuestUsersAction::class)->run($request->all());
        return $this->respondWithSuccess(GuestUserResource::collection($data));
    }

    public function findGuestUserById(int $id): JsonResource
    {
        $data = app(FindGuestUserByIdAction::class)->run($id);
        return $this->respondWithSuccess(new GuestUserResource($data));
    }


    public function updateGuestUser(UpdateGuestUserRequest $request, int $id): JsonResource
    {
        $data = app(UpdateGuestUserAction::class)->run($request->validated(), $id);
        return $this->respondWithSuccess(new GuestUserResource($data));
    }

    public function deleteGuestUser(int $id): JsonResponse
    {
        app(DeleteGuestUserAction::class)->run($id);
        return $this->noContent();
    }
}
