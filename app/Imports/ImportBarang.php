<?php

namespace App\Imports;

use App\Models\Barang;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportBarang implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Barang([
            'nomor_rangka' => $row[0],
            'nomor_mesin' => $row[1],
            'kode_barang' => $row[2],
            'nama_barang' => $row[3],
            'jenis' => $row[4],
            'warna' => $row[5],
            'tahun_rakit' => $row[6],
            'status' => $row[7],
        ]);
    }
}
