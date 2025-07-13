<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat role jika belum ada
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        // Buat user admin
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'), // ganti password sesuai kebutuhan
        ]);
        $admin->assignRole($adminRole);

        // Buat user biasa
        $user = User::create([
            'name' => 'taufikhdyt',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user123'), // ganti password sesuai kebutuhan
        ]);
        $user->assignRole($userRole);
    }
}
