<?php

namespace App\Http\Requests\Showcase;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /** @return array<string, array<int, string>> */
    public function rules(): array
    {
        return [
            'display_name' => ['required', 'string', 'max:100'],
            'bio' => ['nullable', 'string', 'max:500'],
        ];
    }
}
