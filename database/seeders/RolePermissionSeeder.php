<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // Crear permisos
        $permissions = [
            'manage stores',
            'manage users',
            'manage reservations',
            // Agrega más permisos según tus necesidades
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Crear roles
        $superadmin = Role::firstOrCreate(['name' => 'superadmin']);
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $user = Role::firstOrCreate(['name' => 'user']);

        // Asignar todos los permisos al superadmin
        $superadmin->syncPermissions(Permission::all());

        // Asignar permisos específicos al admin
        $admin->syncPermissions([
            'manage stores',
            'manage reservations',
        ]);

        // El rol user puede tener permisos limitados o ninguno
        $user->syncPermissions([
            'manage reservations',
        ]);
    }
}
