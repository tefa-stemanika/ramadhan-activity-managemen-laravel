<?php

namespace App\Imports;

use App\Models\Kelas;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class KelasImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure, SkipsEmptyRows
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    use Importable, SkipsErrors, SkipsFailures;

    public function model(array $row)
    {
        return new Kelas([
            'kode' => $row['kode'],
            'nama' => $row['nama'],
            'kode_guru' => $row['kode_guru']
        ]);
    }

    public function headingRow(): int
    {
        return 1;
    }

    public function rules(): array
    {
        return [
            '*.kode' => ['required', 'max:255', 'unique:kelas,kode'],
            '*.nama' => ['required', 'max:255',],
            '*.kode_guru' => ['required', 'exists:guru,kode']
        ];
    }

    public function customValidationMessages()
    {
        return [
            '*.kode.unique' => ':attribute sudah digunakan oleh kelas lain!',
            '*.kode.required' => ':attribute dibutuhkan!',
            '*.nama.required' => ':attribute dibutuhkan!',
            '*.nama.max' => ':attribute maksimal memiliki 255 karakter!',
            '*.kode_guru.required' => ':attribute dibutuhkan!',
            '*.kode_guru.exists' => ':attribute tidak ditemukan!'
        ];
    }
}
