<?php

namespace App\Http\Requests\V1\Media;

use Illuminate\Foundation\Http\FormRequest;

class CreateMediaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'files' => ['required', 'array'],
            'files.*' => [
                'required',
                'file',
                'max:10240',
                'mimes:jpg,jpeg,png,mp4,pdf'
            ]
        ];
    }
}
