<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
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
}
