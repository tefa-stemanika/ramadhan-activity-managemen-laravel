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
            'nama' => Hash::make($row['nama']),
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
            '*.kode' => ['required', 'max:255', 'unique:users,username'],
            '*.nama' => ['required', 'max:255',],
            '*.username' => ['required', 'in:siswa,guru,walikelas,admin']
        ];
    }

    public function customValidationMessages()
    {
        return [
            '*.kode.unique' => ':attribute sudah digunakan oleh user lain!',
            '*.kode.required' => ':attribute dibutuhkan!',
            '*.username.max' => ':attribute maksimal memiliki 255 karakter!',
            '*.nama.required' => ':attribute dibutuhkan!',
            '*.nama.max' => ':attribute maksimal memiliki 255 karakter!',
            '*.username.required' => ':attribute dibutuhkan!',
            '*.username.in' => 'in:siswa,guru,walikelas,admin'
        ];
    }
}