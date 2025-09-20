<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Crear el usuario superadmin
        $user = User::firstOrCreate(
            ['email' => 'Support@gmail.com'],
            [
                'name' => 'Kevin Jauregui',
                'password' => Hash::make('1'), // Cambia la contraseña en producción
            ]
        );

        // Asignar el rol superadmin
        $user->assignRole('superadmin');
    }
}
