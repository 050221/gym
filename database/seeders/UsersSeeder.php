<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'gender' => 'NULL', // Cambia esto según el género deseado
            'phone' => 'NULL', // Cambia esto según el teléfono deseado
            'email' => 'administrador@gmail.com',
            'password' => Hash::make('admin'),
        ]);
        $admin->assignRole('Admin');

        // Crear usuarios normales y asignarles el rol 'User'
        User::factory(20)->create()->each(function ($user) {
            $user->assignRole('User');
        });
    }
}
