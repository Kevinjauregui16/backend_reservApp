<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                "name" => "Barberia",
            ],
            [
                "name" => "Nutricion",
            ],
            [
                "name" => "Salon de belleza",
            ],
            [
                "name" => "Odontologia",
            ],
            [
                "name" => "Psicologia",
            ],
        ];

        DB::table('categories')->insert($categories);
    }
}
