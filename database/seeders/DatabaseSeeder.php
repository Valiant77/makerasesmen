<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Absen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Absen::factory(500)->create();

        //User::factory(35)->create();
        // User::factory()->create([
        //     'name' => 'Dimas Muliarasis',
        //     'username' => 'dimaskyy',
        //     'email' => 'admin@example.com',
        //     'no_telp' => '081234567890',
        //     'password' => bcrypt('password'),
        //     'pin' => '123456',
        //     'role' => 'admin',
        // ]);
    }
}
