<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Ensure the correct namespace for the User model
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
        // Menyisipkan data pengguna dengan peran admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin',
            'role' => 'admin',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'), // Ganti dengan kata sandi admin yang diinginkan
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Menyisipkan data pengguna dengan peran user
        User::factory()->count(10)->create([
            'role' => 'user',
            'password' => Hash::make('12345678'), // Ganti dengan kata sandi user yang diinginkan
        ]);
    }
}
