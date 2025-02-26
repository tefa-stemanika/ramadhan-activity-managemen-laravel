<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => '1',
                'nis' => '123',
                'nama' => 'siswa1',
                'username' => '123',
                'kode_kelas' => 'kelas1'
            ],
            [
                'id' => '2',
                'nis' => '345',
                'nama' => 'siswa2',
                'username' => '456',
                'kode_kelas' => 'kelas2'
            ],
        ];

        foreach ($data as $value) {
            \App\Models\Siswa::create($value);
        }
    }
}
