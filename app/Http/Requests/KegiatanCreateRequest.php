<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class KegiatanCreateRequest extends FormRequest
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
        $jenisKegiatan = [
            'Kegiatan pembukaan',
            'Shalat Fardu',
            'Shalat Tarawih',
            'Sahur bersama keluarga',
            'Buka puasa bersama keluarga',
            'Kajian islamiyah menjelang buka puasa',
            'Kajian islamiyah malam jumat',
            'Tadarus Al-Quran',
            'Infak harian',
            'Rantang Kayaah',
            'Penulisan mushaf Al-Quran',
            'Ngobras',
            'Penutupan',
        ];

        return [
            'jenis_kegiatan' => ['required', Rule::in($jenisKegiatan)],
            'deskripsi' => ['required', 'string'],
            'foto' => ['required', 'mimes:png,jpg,jpeg,svg', 'max:2048'],
        ];
    }
}
