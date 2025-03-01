<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuruCreateRequest extends FormRequest
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
            'kode' => ['required', 'string', 'unique:guru,kode'],
            'nama' => ['required', 'max:255', 'string'],
            'username' => ['required', 'string', 'exists:users,username', 'unique:guru,username']
        ];
    }
}
