<?php

namespace App\Http\Requests\V1\GuestUsers;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGuestUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'string', 'max:200'],
            'ip_address' => ['sometimes', 'nullable', 'string', 'max:200'],
            'user_agent' => ['sometimes', 'nullable', 'string', 'max:200'],
            'unit_id' => ['nullable', 'int', 'exists:units,id'],
        ];
    }
}
