<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SiswaUpdateRequest extends FormRequest
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
            'nis' => ['required', 'integer', 'digits_between:1,10', Rule::unique('siswa', 'nis')->ignore($this->siswa)],
            'nama' => ['required', 'string', 'max:255'],
            'username' =>  ['required', 'string', 'exists:users,username', Rule::unique('siswa', 'username')->ignore($this->siswa)],
            'kode_kelas' => ['required', 'string', 'exists:kelas,kode']
        ];
    }
}
