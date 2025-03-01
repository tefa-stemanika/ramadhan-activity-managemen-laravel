<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class WalikelasUpdateRequest extends FormRequest
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
            'kode' => ['required', 'string', 'max:255', Rule::unique('walikelas', 'kode')->ignore($this->kode, 'kode')],
            'nama' => ['required', 'string', 'max:255'],
            'kode_kelas' => ['required', 'string', 'exists:kelas,kode', Rule::unique('walikelas', 'kode_kelas')->ignore($this->walikelas)],
            'username' => ['required', 'string', 'exists:users,username', Rule::unique('walikelas', 'username')->ignore($this->walikelas)],
        ];
    }
}
