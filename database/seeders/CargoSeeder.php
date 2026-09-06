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
        Cargo::create(['cargo' => 'Piloto de Nave', 'ativo' => true]);
        Cargo::create(['cargo' => 'Engenheiro de Sistemas Espaciais', 'ativo' => true]);
        Cargo::create(['cargo' => 'Médico a Bordo', 'ativo' => true]);
        Cargo::create(['cargo' => 'Especialista em Robótica', 'ativo' => true]);
    }
}
