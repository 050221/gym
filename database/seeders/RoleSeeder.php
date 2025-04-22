<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;



class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Role1 = Role::create(['name' => 'Admin']);
        $Role2 = Role::create(['name' => 'User']);



        Permission::create(['name' => 'admin.dashboard'])->syncRoles([$Role1]);
        Permission::create(['name' => 'user.dashboard'])->syncRoles([$Role2]);

        Permission::create(['name' => 'admin.suscripciones'])->syncRoles([$Role1]);
        Permission::create(['name' => 'admin.suscripciones.edit'])->syncRoles([$Role1]);
        Permission::create(['name' => 'admin.suscripciones.update'])->syncRoles([$Role1]);
        Permission::create(['name' => 'admin.suscripciones.cancel'])->syncRoles([$Role1]);
        Permission::create(['name' => 'admin.suscripciones.destroy'])->syncRoles([$Role1]);
        Permission::create(['name' => 'admin.transacciones'])->syncRoles([$Role1]);
        Permission::create(['name' => 'admin.historialSuscripciones'])->syncRoles([$Role1]);

        Permission::create(['name' => 'admin.clientes'])->syncRoles([$Role1]);
        Permission::create(['name' => 'admin.clientes.edit'])->syncRoles([$Role1]);
        Permission::create(['name' => 'admin.clientes.update'])->syncRoles([$Role1]);
        Permission::create(['name' => 'admin.clientes.destroy'])->syncRoles([$Role1]);

        Permission::create(['name' => 'admin.membresias'])->syncRoles([$Role1]);
        Permission::create(['name' => 'admin.membresias.edit'])->syncRoles([$Role1]);
        Permission::create(['name' => 'admin.membresias.update'])->syncRoles([$Role1]);
        Permission::create(['name' => 'admin.membresias.destroy'])->syncRoles([$Role1]);



    }
}
