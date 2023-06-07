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
        'nomor_rangka',
        'dealer',
        'harga_terjual',
        'jenis_bayar',
    ];

    public function konsumen(){
        return $this->belongsTo(Konsumen::class, "kode_customer");
    }

    public function wilayah(){
        return $this->belongsTo(Wilayah::class, "kode_wilayah");
    }

    public function gudang(){
        return $this->belongsTo(Gudang::class, "kode_gudang");
    }

    public function karyawan(){
        return $this->belongsTo(User::class, "kode_karyawan");
    }

    public function barang(){
        return $this->belongsTo(Barang::class, "nomor_rangka");
    }

    public function pengiriman_penjualan(){
        return $this->hasMany(Pengiriman::class, "no_fj");
    }

    public function bpkb_stnk(){
        return $this->hasMany(Bpkb_Stnk::class, "no_fj");
    }
}
