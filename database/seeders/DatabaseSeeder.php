<?php

namespace Database\Seeders;

use App\Models\SubDistrict;
use Database\Seeders\DistrictSeeder;
use Database\Seeders\SubDistrictSeeder;;
use Database\Seeders\UserSeeder;
use Database\Seeders\WasteItemSeeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            DistrictSeeder::class,
            SubDistrictSeeder::class,
            UserSeeder::class,
            WasteItemSeeder::class,
        ]);
        // Contoh: $this->call(AnotherSeeder::class);
    }
}
