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
            'number' => 'ADM-BSK-2025-0001', 
            'password' => bcrypt('admin123'),
            'address' => 'Jl. Admin No. 1',
            'balance' => 1000000, // contoh saldo awal
            'district_id' => 1, 
            'sub_district_id' => 1, 

        ]);
        $admin->assignRole($adminRole);

        // Buat user biasa
        $user = User::create([
            'name' => 'taufikhdyt',
            'email' => 'user@gmail.com',
            'number' => 'BSK-2025-0001', 
            'password' => bcrypt('user123'),
            'address' => 'Jl. Admin No. 2',
            'balance' => 1000000,
            'district_id' => 1, 
            'sub_district_id' => 2, 
        ]);
        $user->assignRole($userRole);
    }
}
