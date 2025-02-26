<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => '1',
                'username' => '123',
                'password' => Hash::make(123),
                'role' => 'siswa'
            ],
            [
                'id' => '2',
                'username' => '456',
                'password' => Hash::make(123),
                'role' => 'siswa'
            ],
        ];

        foreach ($data as $value) {
            \App\Models\User::create($value);
        }
    }
}
