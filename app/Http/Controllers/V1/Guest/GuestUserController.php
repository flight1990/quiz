<?php
namespace App\Http\Controllers\V1\Guest;

use App\Actions\GuestUsers\V1\CreateGuestUserAction;
use App\Actions\GuestUsers\V1\DeleteGuestUserAction;
use App\Actions\GuestUsers\V1\FindGuestUserByIdAction;
use App\Actions\GuestUsers\V1\FindGuestUserByUuidAction;
use App\Actions\GuestUsers\V1\GetGuestUsersAction;
use App\Actions\GuestUsers\V1\UpdateGuestUserAction;
use App\Http\Controllers\ApiController;
use App\Http\Requests\V1\GuestUsers\CreateGuestUserRequest;
use App\Http\Requests\V1\GuestUsers\UpdateGuestUserRequest;
use App\Http\Resources\V1\GuestUsers\GuestUserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class GuestUserController extends ApiController
{
    public function findGuestUserByUuid(string $uuid): JsonResource
    {
        $data = app(FindGuestUserByUuidAction::class)->run($uuid);
        return $this->respondWithSuccess(new GuestUserResource($data));
    }

    public function createGuestUser(CreateGuestUserRequest $request): JsonResponse
    {
        $data = app(CreateGuestUserAction::class)->run($request->validated());
        return $this->respondWithSuccessCreate(new GuestUserResource($data));
    }
}
