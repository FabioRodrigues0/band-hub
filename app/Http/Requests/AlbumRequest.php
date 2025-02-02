<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AlbumRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'band_id' => ['required', 'exists:bands,id'],
            'year_release' => ['required', 'integer', 'min:1900', 'max:' . (date('Y') + 1)],
            'image' => ['nullable', 'url'],
            'artist_ids' => ['sometimes', 'array'],
            'artist_ids.*' => ['exists:artists,id'],
        ];
    }
}
