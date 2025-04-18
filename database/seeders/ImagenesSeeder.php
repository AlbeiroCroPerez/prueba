<?php

namespace Database\Seeders;

use App\Models\Imagenes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImagenesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Imagenes::create([
            'imagen' =>'imagen 1' ,
            'autor'=> 'desconocido',
            'url' => 'skmdasmdkmasksa',
          ]);

          Imagenes::create([
            'imagen' =>'imagen 2' ,
            'autor'=> 'desconocido',
            'url' => 'skmdasmdkmasksa',
          ]);

          Imagenes::create([
            'imagen' =>'imagen 3' ,
            'autor'=> 'desconocido',
            'url' => 'skmdasmdkmasksa',
          ]);
    }
}
