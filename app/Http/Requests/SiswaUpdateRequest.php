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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
       return [
            'nis' => ['required', 'integer', 'digits_between:1,10',Rule::unique('siswa', 'nis')->ignore($this->nis, 'nis')],
            'nama' => ['required', 'string', 'max:255'],
            'username' => ['nullable', 'string', 'exists:users,username'],
            'kode_kelas' => ['nullable', 'string', 'exists:kelas,kode']
        ];
    }
}
