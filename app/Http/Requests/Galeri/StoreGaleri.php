<?php

namespace App\Http\Requests\Galeri;

use Illuminate\Foundation\Http\FormRequest;

// Library
use Symfony\Component\HttpFoundation\Response;

// Middleware
use Gate;

class StoreGaleri extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('galeri_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'judul' => [
                'required', 'string', 'max:255'
            ],
            'gambar' => [
                'nullable', 'mimes:jpeg,svg,png', 'max:10000'
            ],
            'isi' => [
                'required', 'string', 'max:255'
            ],
        ];
    }
}
