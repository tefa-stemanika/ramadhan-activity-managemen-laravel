<?php

namespace App\Imports;

use App\Models\Guru;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class GuruImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure, SkipsEmptyRows
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    use Importable, SkipsErrors, SkipsFailures;

    public function model(array $row)
    {
        return new Guru([
            'kode' => $row['kode'],
            'nama' => $row['nama'],
            'username' => $row['username']
        ]);
    }

    public function headingRow(): int
    {
        return 1;
    }

    public function rules(): array
    {
        return [
            '*.kode' => ['required', 'max:255', 'unique:guru,kode'],
            '*.nama' => ['required', 'max:255',],
            '*.username' => ['required', 'unique:guru,username', 'exists:users,username']
        ];
    }

    public function customValidationMessages()
    {
        return [
            '*.kode.unique' => ':attribute sudah digunakan oleh guru lain!',
            '*.kode.required' => ':attribute dibutuhkan!',
            '*.username.unique' => ':attribute sudah digunakan!',
            '*.nama.required' => ':attribute dibutuhkan!',
            '*.nama.max' => ':attribute maksimal memiliki 255 karakter!',
            '*.username.required' => ':attribute dibutuhkan!',
            '*.username.exists' => ':attribute tidak ditemukan!'
        ];
    }
}
