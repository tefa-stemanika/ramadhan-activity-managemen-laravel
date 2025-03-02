<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kode' => 'guru1',
                'nama' => 'guru 1',
                'username' => 'guru1'
            ],
        ];

        foreach ($data as $value) {
            \App\Models\Guru::create($value);
        }
    }
}
