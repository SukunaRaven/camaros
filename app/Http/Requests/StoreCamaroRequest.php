<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCamaroRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'year' => 'required|integer|min:1950|max:' . date('Y'),
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048'
        ];
    }
}
