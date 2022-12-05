<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreGalleryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string','max:100'],
            'cover' => ['nullable', 'image'],
            'description' => ['nullable', 'string']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
