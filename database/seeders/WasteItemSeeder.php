<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WasteItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('waste_items')->insert([
            [
                'output' => 'Daun Kering',
                'category' => 'Kompos',
                'unit' => 'Kilogram (Kg)',
                'price' => 400,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'output' => 'Sisa Makanan',
                'category' => 'Kompos',
                'unit' => 'Kilogram (Kg)',
                'price' => 300,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'output' => 'Minyak Jelantah',
                'category' => 'Kriya',
                'unit' => 'Kilogram (Kg)',
                'price' => 3000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'output' => 'Tutup Botol',
                'category' => 'Le Minerale',
                'unit' => 'Kilogram (Kg)',
                'price' => 2300,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'output' => 'Aqua (Tutup Botol)',
                'category' => 'Kriya',
                'unit' => 'Kilogram (Kg)',
                'price' => 2400,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'output' => 'Cleo (Tutup Botol)',
                'category' => 'Kriya',
                'unit' => 'Kilogram (Kg)',
                'price' => 2400,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'output' => 'Botol Plastik Tanpa Tutup - Le Minerale',
                'category' => 'Kriya',
                'unit' => 'Kilogram (Kg)',
                'price' => 1300,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'output' => 'Botol Plastik Tanpa Tutup - Aqua',
                'category' => 'Kriya',
                'unit' => 'Kilogram (Kg)',
                'price' => 1400,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'output' => 'Botol Plastik Tanpa Tutup - Cleo',
                'category' => 'Kriya',
                'unit' => 'Kilogram (Kg)',
                'price' => 1300,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'output' => 'Kertas Bekas',
                'category' => 'Kriya',
                'unit' => 'Kilogram (Kg)',
                'price' => 700,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'output' => 'Kardus',
                'category' => 'Kriya',
                'unit' => 'Kilogram (Kg)',
                'price' => 400,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'output' => 'Piring Telur',
                'category' => 'Kriya',
                'unit' => 'Kilogram (Kg)',
                'price' => 300,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
