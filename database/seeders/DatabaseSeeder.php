<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\ServicesSeeder;
use Database\Seeders\ServiceSchedulesSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ServicesSeeder::class
        ]);

        $this->call([
            ServiceSchedulesSeeder::class
        ]);
    }
}
