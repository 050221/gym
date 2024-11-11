<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear y asignar rol para el usuario administrador
        $admin = User::factory()->create([
            'name' => 'Admin',
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'gender' => 'Male', // Cambia esto según el género deseado
            'phone' => '123456789', // Cambia esto según el teléfono deseado
            'email' => 'administrador@gmail.com',
            'password' => bcrypt('admin'),
        ]);
        $admin->assignRole('Admin');

        // Crear usuarios normales y asignarles el rol 'User'
        User::factory(50)->create()->each(function ($user) {
            $user->assignRole('User');
        });
    }
}
