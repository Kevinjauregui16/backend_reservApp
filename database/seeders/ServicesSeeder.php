<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesSeeder extends Seeder
{
    public function run()
    {
        $services = [
            [
                "category" => "Salud",
                "name" => "Consulta medica general",
                "ranking" => 4.7,
                "location" => "Farmacias similares",
                "description" => "Consulta para toda la familia",
                "duration" => 45,
                "price" => 90.00,
            ],
            [
                "category" => "Barberia",
                "name" => "Corte de cabello caballero",
                "ranking" => 4.9,
                "location" => "Barberia El Rey",
                "description" => "Corte de cabello y arreglo de barba",
                "duration" => 60,
                "price" => 150.00,
            ],
            [
                "category" => "Psicologia",
                "name" => "Terapia individual",
                "ranking" => 4.4,
                "location" => "Centro de Psicologia Integral",
                "description" => "terapia individual profesional",
                "duration" => 120,
                "price" => 249.00,
            ],
            [
                "category" => "Belleza",
                "name" => "Manicura",
                "ranking" => 4.7,
                "location" => "Salón de Belleza Glamour",
                "description" => "Manicura y pedicura",
                "duration" => 90,
                "price" => 299.00,
            ],
            [
                "category" => "Odontologia",
                "name" => "Limpieza dental",
                "ranking" => 5,
                "location" => "Clínica Dental Sonrisas",
                "description" => "Limpieza y revisión dental",
                "duration" => 60,
                "price" => 180.00,
            ],
            [
                "category" => "Salud",
                "name" => "Curaciones",
                "ranking" => 4.5,
                "location" => "Farmacias similares",
                "description" => "Curaciones y vendajes",
                "duration" => 30,
                "price" => 59.00,
            ],
            [
                "category" => "Salud",
                "name" => "Consulta medica especializada",
                "ranking" => 4.8,
                "location" => "Hospital Ángeles",
                "description" => "Consulta con especialista",
                "duration" => 60,
                "price" => 500.00,
            ],
            [
                "category" => "nutricion",
                "name" => "Consulta de nutrición",
                "ranking" => 4.6,
                "location" => "NutriSalud",
                "description" => "Consulta con nutriologo",
                "duration" => 45,
                "price" => 350.00,
            ],
            [
                "category" => "Belleza",
                "name" => "Corte y tinte de cabello",
                "ranking" => 4.3,
                "location" => "Salón de Belleza Girls",
                "description" => "Corte y tinte de cabello",
                "duration" => 120,
                "price" => 220.00,
            ],
            [
                'category' => 'Barberia',
                'name' => 'Corte para niño',
                'ranking' => 4.5,
                'location' => 'Barberia El Rey',
                'description' => 'Corte de cabello para niño',
                'duration' => 45,
                'price' => 50.00,
            ],
            [
                'category' => 'Psicologia',
                'name' => 'Terapia de pareja',
                'ranking' => 4.6,
                'location' => 'Centro de Psicologia Integral',
                'description' => 'Sesión de terapia para parejas',
                'duration' => 90,
                'price' => 350.00,
            ],
            [
                'category' => 'Belleza',
                'name' => 'Depilación con cera',
                'ranking' => 4.8,
                'location' => 'Salón de Belleza Glamour',
                'description' => 'Depilación con cera caliente',
                'duration' => 60,
                'price' => 150.00,
            ],
            [
                "category" => "Odontologia",
                "name" => "Ortodoncia",
                "ranking" => 4.9,
                "location" => "Clínica Dental Sonrisas",
                "description" => "Tratamiento de ortodoncia",
                "duration" => 120,
                "price" => 5000.00,
            ],
            [
                'category' => 'Barberia',
                'name' => 'Afeitado con navaja',
                'ranking' => 4.8,
                'location' => 'Barberia El Rey',
                'description' => 'Afeitado tradicional con navaja',
                'duration' => 30,
                'price' => 80.00,
            ],
            [
                'category' => 'Salud',
                'name' => 'Consulta de medicina general',
                'ranking' => 4.6,
                'location' => 'Clínica de Salud Familiar',
                'description' => 'Consulta médica general para toda la familia',
                'duration' => 60,
                'price' => 200.00,
            ],
            [
                "category" => "Salud",
                "name" => "Consulta de opstetricia",
                "ranking" => 4.9,
                "location" => "Hospital de la Mujer",
                "description" => "Consulta especializada en obstetricia",
                "duration" => 60,
                "price" => 350.00,
            ]
        ];

        DB::table('services')->insert($services);
    }
}
