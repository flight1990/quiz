<?php

namespace App\Http\Requests\V1\GuestUsers;

use Illuminate\Foundation\Http\FormRequest;

class CreateGuestUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['nullable', 'string', 'max:200'],
            'ip_address' => ['nullable', 'string', 'max:200'],
            'user_agent' => ['nullable', 'string', 'max:200'],
            'unit_id' => ['nullable', 'int', 'exists:units'],
        ];
    }
}
