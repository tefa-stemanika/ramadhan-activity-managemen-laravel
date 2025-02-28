<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class UserImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure, SkipsEmptyRows
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    use Importable, SkipsErrors, SkipsFailures;

    public function model(array $row)
    {
        return new User([
            'username' => $row['username'],
            'password' => Hash::make($row['password']),
            'role' => $row['role']
        ]);
    }

    public function headingRow(): int
    {
        return 1;
    }

    public function rules(): array
    {
        return [
            '*.username' => ['required', 'max:255', 'unique:users,username'],
            '*.password' => ['required', 'max:255',],
            '*.role' => ['required', 'in:siswa,guru,walikelas,admin']
        ];
    }

    public function customValidationMessages()
    {
        return [
            '*.username.unique' => ':attribute sudah digunakan oleh user lain!',
            '*.username.required' => ':attribute dibutuhkan!',
            '*.username.max' => ':attribute maksimal memiliki 255 karakter!',
            '*.password.required' => ':attribute dibutuhkan!',
            '*.password.max' => ':attribute maksimal memiliki 255 karakter!',
            '*.role.required' => ':attribute dibutuhkan!',
            '*.role.in' => 'in:siswa,guru,walikelas,admin'
        ];
    }
}
