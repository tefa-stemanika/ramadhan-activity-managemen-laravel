<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kode' => 'kelas1',
                'nama' => 'kelas1',
                'kode_guru' => 'guru1'
            ],
        ];

        foreach ($data as $value) {
            \App\Models\Kelas::create($value);
        }
    }
}
