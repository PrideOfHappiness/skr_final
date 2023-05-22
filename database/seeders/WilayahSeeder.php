<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Wilayah;

class WilayahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Wilayah::create([
            'kode_wilayah' => 'BLI0009',
            'nama_wilayah' => 'KAB BLITAR',
        ]);

        Wilayah::create([
            'kode_wilayah' => 'BLI0007',
            'nama_wilayah' => 'KOTA BLITAR',
        ]); 
    }
}
