<?php

namespace Database\Seeders;

use Database\Seeders\UserSeeder;
use Database\Seeders\ObrasSeeder;
use Database\Seeders\IncidentesSeeder;
use Database\Seeders\ImagenesSeeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(IncidentesSeeder::class);
        $this->call(ImagenesSeeder::class);
        $this->call(ObrasSeeder::class);
    }
}
