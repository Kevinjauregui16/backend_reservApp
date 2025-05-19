<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSchedulesSeeder extends Seeder
{
   public function run()
    {
        // Días de la semana en español
        $dias = [
            'lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábado'
        ];

        // Horario ejemplo para todos los días
        $start_time = '09:00:00';
        $end_time = '18:00:00';

        // Obtener todos los servicios
        $services = DB::table('services')->get();

        $schedules = [];

        foreach ($services as $service) {
            foreach ($dias as $dia) {
                $schedules[] = [
                    'service_id' => $service->id,
                    'day_of_week' => $dia,
                    'start_time' => $start_time,
                    'end_time' => $end_time,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        DB::table('service_schedules')->insert($schedules);
    }
}
