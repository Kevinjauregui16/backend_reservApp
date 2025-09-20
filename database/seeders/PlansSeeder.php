<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlansSeeder extends Seeder
{
    public function run()
    {
        $plans = [
            [
                "name" => "Free Plan",
                "description" => "Plan de prueba",
                "price" => 0,
                "discount_price" => null,
                "duration_days" => 30,
                "is_active" => true,
            ],
            [
                "name" => "Premium Plan",
                "description" => "Plan premium",
                "price" => 79,
                "discount_price" => null,
                "duration_days" => 30,
                "is_active" => true,
            ],
        ];

        DB::table('plans')->insert($plans);
    }
}
