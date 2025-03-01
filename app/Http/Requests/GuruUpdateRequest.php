<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GuruUpdateRequest extends FormRequest
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
            'kode' => ['required', 'string', Rule::unique('guru', 'kode')->ignore($this->guru)],
            'nama' => ['required', 'max:255', 'string'],
            'username' => ['required', 'string', 'exists:users,username', Rule::unique('guru', 'username')->ignore($this->guru)]
        ];
    }
}
