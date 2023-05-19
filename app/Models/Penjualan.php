<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualan';

    protected $fillable = [
        'no_fj',
        'kode_customer',
        'kode_wilayah',
        'kode_gudang',
        'kode_karyawan',
        'kode_barang',
        'dealer',
        'harga_terjual',
    ];

    public function kode_customer(){
        return $this->belongsTo(Konsumen::class, "kode_customer");
    }

    public function kode_wilayah(){
        return $this->belongsTo(Wilayah::class, "kode_wilayah");
    }

    public function kode_gudang(){
        return $this->belongsTo(Gudang::class, "kode_gudang");
    }

    public function kode_karyawan(){
        return $this->belongsTo(User::class, "kode_karyawan");
    }

    public function kode_barang(){
        return $this->belongsTo(Barang::class, "kode_barang");
    }
}
