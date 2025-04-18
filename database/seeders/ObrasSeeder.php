<?php

namespace Database\Seeders;

use App\Models\Obras;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ObrasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Obras::create([
            'numero' => '120',
            'nombre' => 'Calle',
            'clave' => 'GT2024-NEZ/05',
            'objeto' => 'Renovacion de las calles y banquetas del municipio de Neza',
            'direccion' => 'Colonia Benito Juarez, Cd. Nezahualcoyotl, Edo. de Mexico',
            'coordenadas' => '19.413696407789562, -99.0402839953203',
            'imagen_id' => '1',
            'incidente_id' => '1',
         ]);

         Obras::create([
            'numero' => '500',
            'nombre' => 'Revolucion',
            'clave' => 'GT2025-MRV/48',
            'objeto' => 'Ampliacion del lugar y locales de la plaza del Monumento de la Revolucion',
            'direccion' => 'Pl. de la República s/n, Tabacalera, Cuauhtémoc, 06030 Ciudad de México, CDMX',
            'coordenadas' => '19.436340108350983, -99.15457616112356',
            'imagen_id' => '2',
            'incidente_id' => '2',
         ]);

         Obras::create([
            'numero' => '250',
            'nombre' => 'Angel',
            'clave' => 'GT2025-ANG/25',
            'objeto' => 'Renovacion de estructura y pavimento del area del Angel de la Independencia',
            'direccion' => 'Av. P.º de la Reforma, Juárez, Cuauhtémoc, 06600 Ciudad de México, CDMX',
            'coordenadas' => '19.42713189341962, -99.16763690228649',
            'imagen_id' => '3',
            'incidente_id' => '3',
         ]);

    }
}
