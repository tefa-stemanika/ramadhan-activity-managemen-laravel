<?php

namespace App\Imports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class SiswaImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure, SkipsEmptyRows
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    use Importable, SkipsErrors, SkipsFailures;

    public function model(array $row)
    {
        return new Siswa([
            'nis' => $row['nis'],
            'nama' => $row['nama'],
            'username' => $row['username'],
            'kode_kelas' => $row['kode_kelas'],
        ]);
    }

    public function headingRow(): int
    {
        return 1;
    }

    public function rules(): array
    {
        return [
            '*.nis' => ['required', 'integer', 'digits_between:1,10', 'unique:siswa,nis'],
            '*.nama' => ['required', 'string', 'max:255'],
            '*.username' => ['required', 'string', 'exists:users,username', 'unique:siswa,username'],
            '*.kode_kelas' => ['required', 'string', 'exists:kelas,kode']
        ];
    }

    public function customValidationMessage()
    {
        return [
            '*.nis.required' => 'NIS harus diisi!',
            '*.nis.integer' => 'NIS harus berupa angka!',
            '*.nis.digits_between' => 'NIS harus terdiri dari 1 hingga 10 digit!',
            '*.nis.unique' => 'NIS sudah terdaftar!',
            '*.nama.required' => 'Nama harus diisi!',
            '*.nama.string' => 'Nama harus berupa teks!',
            '*.nama.max' => 'Nama maksimal 255 karakter!',
            '*.username.exists' => 'Username tidak ditemukan di tabel users!',
            '*.username.required' => 'Username wajib diisi!',
            '*.username.unique' => 'Username sudah terdaftar!',
            '*.kode_kelas.exists' => 'Kode kelas tidak ditemukan di tabel kelas!',
            '*.kode_kelas.required' => 'Kode kelas wajib diisi!'
        ];
    }
}
