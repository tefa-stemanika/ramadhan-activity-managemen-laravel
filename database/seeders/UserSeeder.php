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
                'username' => '123',
                'password' => Hash::make(123),
                'role' => 'siswa'
            ],
            [
                'username' => '456',
                'password' => Hash::make(123),
                'role' => 'siswa'
            ],
            [
                'username' => 'admin',
                'password' => Hash::make(123),
                'role' => 'admin'
            ],
            [
                'username' => 'guru1',
                'password' => Hash::make(123),
                'role' => 'guru'
            ],
        ];

        foreach ($data as $value) {
            \App\Models\User::create($value);
        }
    }
}
