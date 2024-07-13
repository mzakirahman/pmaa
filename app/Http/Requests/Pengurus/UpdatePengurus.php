<?php

namespace App\Http\Requests\Pengurus;

use Illuminate\Foundation\Http\FormRequest;

// Library
use Symfony\Component\HttpFoundation\Response;

// Middleware
use Gate;

class UpdatePengurus extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('pengurus_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'jabatan_id' => [
                'nullable'
            ],
            'nama' => [
                'nullable', 'string', 'max:255'
            ],
            'kontak' => [
                'nullable', 'string', 'max:255'
            ],
            'jenis_kelamin' => [
                'nullable', 'string', 'max:255'
            ],
            'alamat' => [
                'nullable'
            ],
            'foto' => [
                'nullable', 'mimes:jpeg,svg,png', 'max:10000'
            ],
        ];
    }
}
