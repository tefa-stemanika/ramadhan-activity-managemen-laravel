<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nis' => '123',
                'jenis_kegiatan' => 'Kegiatan pembukaan',
                'deskripsi' => 'pembukaan',
                'foto' => 'uploads/1740547427.png'
            ],
            [
                'nis' => '123',
                'jenis_kegiatan' => 'Shalat Fardu',
                'deskripsi' => 'Shalat Fardu',
                'foto' => 'uploads/1740547427.png'
            ],
        ];

        foreach ($data as $value) {
            \App\Models\Kegiatan::create($value);
        }
    }
}
