<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gudang;

class GudangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gudang::create([
            'kode_gudang' => 'S0001',
            'nama_gudang' => 'Gudang 1',
            'alamat_gudang' => 'Jl. Hayam Wuruk no. 58 Wilingi',
        ]);
    }
}
