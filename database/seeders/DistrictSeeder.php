<?php

namespace Database\Seeders;

use App\Models\District as Kecamatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kec = [
            [
                'id' => '1',
                'name' => 'Bontang Barat',
            ],
            [
                'id' => '2',
                'name' => 'Bontang Utara',
            ],
            [
                'id' => '3',
                'name' => 'Bontang Selatan',
            ],
        ];

        foreach ($kec as $key => $kec) {
            Kecamatan::create($kec);
        }
    }
}
