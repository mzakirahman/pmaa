<?php

namespace App\Http\Requests\Berita;

use Illuminate\Foundation\Http\FormRequest;

// Library
use Symfony\Component\HttpFoundation\Response;

// Middleware
use Gate;

class StoreBerita extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('berita_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'author' => [
                'required', 'string', 'max:255'
            ],
            'judul' => [
                'required', 'string', 'max:255'
            ],
            'gambar' => [
                'nullable', 'mimes:jpeg,svg,png', 'max:10000'
            ],
            'isi' => [
                'required'
            ],
        ];
    }
}
