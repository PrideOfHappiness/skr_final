<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $fillable = [
        'nomor_rangka',
        'nomor_mesin',
        'kode_barang',
        'nama_barang',
        'jenis',
        'warna',
        'tahun_rakit',
        'status',
    ];

    public function penjualan(){
        return $this->hasMany(Penjualan::class, "kode_barang");
    }
}
