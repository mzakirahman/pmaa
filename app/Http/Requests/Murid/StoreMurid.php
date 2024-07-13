<?php

namespace App\Http\Requests\Murid;

use Illuminate\Foundation\Http\FormRequest;

// Library
use Symfony\Component\HttpFoundation\Response;

// Middleware
use Gate;

class StoreMurid extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('pengurus_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'nama' => [
                'required', 'string', 'max:255'
            ],
            'kontak' => [
                'required', 'string', 'max:255'
            ],
            'jenis_kelamin' => [
                'required', 'string', 'max:255'
            ],
            'nisn' => [
                'required'
            ],
            'nama_wali' => [
                'required'
            ],
            'foto' => [
                'nullable', 'mimes:jpeg,svg,png', 'max:10000'
            ],
        ];
    }
}
