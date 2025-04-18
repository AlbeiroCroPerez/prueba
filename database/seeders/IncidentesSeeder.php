<?php

namespace Database\Seeders;

use App\Models\Incidentes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IncidentesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Incidentes::create([
            'tipo' => 'maquina',
            'descripcion' => 'falta de la maquina para colar y pavimentar la calle',
            'fecha' => '2024-10-05',
        ]);
        Incidentes::create([
            'tipo' => 'material',
            'descripcion' => 'falta de material para completar la obra',
            'fecha' => '2024-05-15',
        ]);
        Incidentes::create([
            'tipo' => 'lesion',
            'descripcion' => 'accidente de un empleado',
            'fecha' => '2024-12-10',
        ]);
    }
}
