<?php
namespace App\Http\Controllers\V1\Guest;

use App\Actions\GuestUsers\V1\CreateGuestUserAction;
use App\Http\Controllers\ApiController;
use App\Http\Requests\V1\GuestUsers\CreateGuestUserRequest;
use App\Http\Resources\V1\GuestUsers\GuestUserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Laravel\Passport\Token;
use Prettus\Validator\Exceptions\ValidatorException;

class GuestUserController extends ApiController
{
    /**
     * @throws ValidatorException
     */
    public function token(CreateGuestUserRequest $request): JsonResponse
    {
        $payload = array_merge($request->validated(), [
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        $data = app(CreateGuestUserAction::class)->run($payload);

        return $this->respondWithArray([
            'data' => GuestUserResource::make($data['guestUser']),
            'access_token' => $data['accessToken'],
        ]);
    }

    /**
     * @throws ValidatorException
     */
    public function anonymousToken(Request $request): JsonResponse
    {
        $payload = [
            'ip_address' => $request->header('X-Real-IP', $request->ip()), //  Использует X-Real-IP если есть, иначе стандартный IP //$request->ip(),
            'user_agent' => $request->userAgent(),
        ];

        $data = app(CreateGuestUserAction::class)->run($payload);

        return $this->respondWithArray([
            'data' => GuestUserResource::make($data['guestUser']),
            'access_token' => $data['accessToken'],
        ]);
    }

    public function getMe(): ResourceCollection|JsonResource
    {
        $guest = auth('guest-api')->user();
        return $this->respondWithSuccess(GuestUserResource::make($guest));
    }

    public function tokenRevoke(): JsonResponse
    {
        $guest = auth('guest-api')->user();

        $guest->tokens()->each(function (Token $token) {
            $token->revoke();
        });

        return $this->noContent();
    }
}
