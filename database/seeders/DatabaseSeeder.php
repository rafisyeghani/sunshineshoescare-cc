<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\UserSeeder as SeedersUserSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use UserSeeder;
use UsersSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
{
    $this->call([
        SeedersUserSeeder::class,
        // Include other seeders here
    ]);
}

}
