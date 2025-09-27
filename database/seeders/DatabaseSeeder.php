<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\ServicesSeeder;
use Database\Seeders\ServiceSchedulesSeeder;
use Database\Seeders\RolePermissionSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\CategoriesSeeder;
use Database\Seeders\PlansSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $this->call([
        //     ServicesSeeder::class
        // ]);

        // $this->call([
        //     ServiceSchedulesSeeder::class
        // ]);

        $this->call([
            RolePermissionSeeder::class
        ]);

        $this->call([
            UserSeeder::class
        ]);

        $this->call([
            CategoriesSeeder::class
        ]);

        $this->call([
            PlansSeeder::class
        ]);
    }
}
