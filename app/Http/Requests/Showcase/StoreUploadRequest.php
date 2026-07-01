<?php

namespace App\Http\Requests\Showcase;

use Illuminate\Foundation\Http\FormRequest;

class StoreUploadRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /** @return array<string, array<int, string>> */
    public function rules(): array
    {
        return [
            'document' => ['required', 'file', 'max:5120', 'mimes:pdf,doc,docx,txt,png,jpg,jpeg'],
        ];
    }
}
