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
            'name' => ['required', 'string', 'max:200'],
            'unit_id' => ['required', 'int', 'exists:units,id'],
        ];
    }
}
