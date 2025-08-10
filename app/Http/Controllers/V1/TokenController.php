<?php

namespace App\Http\Controllers\V1;

use App\Actions\Users\V1\FindUserByIdAction;
use App\Http\Controllers\ApiController;
use App\Http\Resources\V1\Users\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Laravel\Passport\Token;

class TokenController extends ApiController
{
    public function tokenRevoke(Request $request): JsonResponse
    {
        $user = $request->user();

        $user->tokens()->each(function (Token $token) {
            $token->revoke();
            $token->refreshToken?->revoke();
        });

        return $this->noContent();
    }

    public function getMe(): ResourceCollection|JsonResource
    {
        $data = app(FindUserByIdAction::class)->run(auth('api')->id());
        return $this->respondWithSuccess(new UserResource($data));
    }
}
