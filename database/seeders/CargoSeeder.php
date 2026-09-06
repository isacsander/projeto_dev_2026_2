<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cargo::create(['titulo' => 'Piloto de Nave', 'ativo' => true]);
        Cargo::create(['titulo' => 'Engenheiro de Sistemas Espaciais', 'ativo' => true]);
        Cargo::create(['titulo' => 'Médico a Bordo', 'ativo' => true]);
        Cargo::create(['titulo' => 'Especialista em Robótica', 'ativo' => true]);
    }
}
