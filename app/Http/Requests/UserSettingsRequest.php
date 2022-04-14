<?php

namespace App\Http\Requests;

class UserSettingsRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'search_male' => ['required_unless:search_female,1'],
            'search_female' => ['required_unless:search_male,1']
        ];
    }
}



