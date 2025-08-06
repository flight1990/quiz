<?php

namespace App\Http\Requests\V1\Units;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUnitRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'string', 'max:200', 'unique:units,name,'.$this['id']],
        ];
    }
}
