<?php

namespace App\Http\Requests\V1\Quizzes;

use Illuminate\Foundation\Http\FormRequest;

class GetQuizzesRequest extends FormRequest
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
