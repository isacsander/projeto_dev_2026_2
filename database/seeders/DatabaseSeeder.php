<?php

namespace Database\Seeders;

use App\Models\User;
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
        
        User::factory()->create([
            'name' => 'Comandante Admin',
            'email' => 'admin@missao.com',
            'password' => bcrypt('senha123'),
        ]);
        $this->call([
            CargoSeeder::class,
        ]);

    }
}
