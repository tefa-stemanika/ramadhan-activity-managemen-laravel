<?php

namespace App\Imports;

use App\Models\Walikelas;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class WalikelasImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure, SkipsEmptyRows
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    use Importable, SkipsErrors, SkipsFailures;

    public function model(array $row)
    {
        return new Walikelas([
           'kode'       => $row['kode'],
            'nama'       => $row['nama'],
            'kode_kelas' => $row['kode_kelas'] ?? null,
            'username'   => $row['username'] ?? null,
        ]);
    }

     public function headingRow(): int {
        return 1;
    }

    public function rules(): array {
        return [
            '*.kode' => ['required', 'string', 'unique:walikelas,kode'],
            '*.nama' => ['required', 'string', 'max:255'],
            '*.kode_kelas' => ['nullable', 'string', 'exists:kelas,kode'],
            '*.username' => ['nullable', 'string', 'exists:users,username'],
        ];
    }

    public function customValidationMessages() {
        return [
            '*.kode.required' => 'Kode wali kelas wajib diisi!',
            '*.kode.unique' => 'Kode wali kelas sudah digunakan!',
            '*.nama.required' => 'Nama wajib diisi!',
            '*.nama.max' => 'Nama maksimal 255 karakter!',
            '*.kode_kelas.exists' => 'Kode kelas tidak ditemukan!',
            '*.username.exists' => 'Username tidak ditemukan di tabel users!',
        ];
    }
}
