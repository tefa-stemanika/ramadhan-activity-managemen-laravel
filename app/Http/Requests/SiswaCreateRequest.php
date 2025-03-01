<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiswaCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nis' => ['required', 'integer', 'digits_between:1,10', 'unique:siswa,nis'],
            'nama' => ['required', 'string', 'max:255'],
            'username' =>  ['required', 'string', 'exists:users,username', 'unique:siswa,username'],
            'kode_kelas' => ['required', 'string', 'exists:kelas,kode']
        ];
    }
}
