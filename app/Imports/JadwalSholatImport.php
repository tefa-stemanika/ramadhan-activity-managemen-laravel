<?php

namespace App\Imports;

use App\Models\JadwalSholat;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class JadwalSholatImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure, SkipsEmptyRows
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    use Importable, SkipsErrors, SkipsFailures;

    public function model(array $row)
    {
        return new JadwalSholat([
            'tanggal' => $row['tanggal'],
            'imsak' => $row['imsak'],
            'subuh' => $row['subuh'],
            'terbit' => $row['terbit'],
            'dhuha' => $row['dhuha'],
            'dzuhur' => $row['dzuhur'],
            'ashar' => $row['ashar'],
            'maghrib' => $row['maghrib'],
            'isya' => $row['isya'],
        ]);
    }

    public function headingRow(): int
    {
        return 1;
    }

    public function rules(): array
    {
        return [
            '*.tanggal' => ['required', 'date'],
            '*.imsak' => ['required', 'date_format:H:i'],
            '*.subuh' => ['required', 'date_format:H:i'],
            '*.terbit' => ['required', 'date_format:H:i'],
            '*.dhuha' => ['required', 'date_format:H:i'],
            '*.dzuhur' => ['required', 'date_format:H:i'],
            '*.ashar' => ['required', 'date_format:H:i'],
            '*.maghrib' => ['required', 'date_format:H:i'],
            '*.isya' => ['required', 'date_format:H:i'],
        ];
    }

    public function customValidationMessages()
    {
        return [
            '*.tanggal.required' => ':attribute dibutuhkan!',
            '*.tanggal.date' => ':attribute harus dalam format tanggal!',
            '*.imsak.required' => ':attribute dibutuhkan!',
            '*.imsak.date_format' => ':attribute harus dalam format HH:MM!',
            '*.subuh.required' => ':attribute dibutuhkan!',
            '*.subuh.date_format' => ':attribute harus dalam format HH:MM!',
            '*.terbit.required' => ':attribute dibutuhkan!',
            '*.terbit.date_format' => ':attribute harus dalam format HH:MM!',
            '*.dhuha.required' => ':attribute dibutuhkan!',
            '*.dhuha.date_format' => ':attribute harus dalam format HH:MM!',
            '*.dzuhur.required' => ':attribute dibutuhkan!',
            '*.dzuhur.date_format' => ':attribute harus dalam format HH:MM!',
            '*.ashar.required' => ':attribute dibutuhkan!',
            '*.ashar.date_format' => ':attribute harus dalam format HH:MM!',
            '*.maghrib.required' => ':attribute dibutuhkan!',
            '*.maghrib.date_format' => ':attribute harus dalam format HH:MM!',
            '*.isya.required' => ':attribute dibutuhkan!',
            '*.isya.date_format' => ':attribute harus dalam format HH:MM!',
        ];
    }
}