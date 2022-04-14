<?php

namespace App\Http\Requests;

class UserProfileRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'surname' => ['required', 'string', 'min:3', 'max:255'],
            'age' => ['required', 'int', 'min:18', 'max:100'],
            'description' => ['required', 'min:10', 'max:500'],
        ];
    }
}
