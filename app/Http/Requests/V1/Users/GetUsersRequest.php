<?php

namespace App\Http\Requests\V1\Users;

use Illuminate\Foundation\Http\FormRequest;

class GetUsersRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'search' => ['sometimes', 'string', 'max:200'],
            'orderBy' => ['sometimes', 'string', 'in:id,name,email'],
            'sortedBy' => ['sometimes', 'string', 'in:asc,desc']
        ];
    }
}
