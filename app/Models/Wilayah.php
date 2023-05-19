<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    use HasFactory;

    protected $table = "wilayah";

    protected $fillable = [
        'kode_wilayah',
        'nama_wilayah',
    ];
    
    public function wilayah_konsumen(){
        return $this->hasMany(Konsumen::class, "wilayah");
    }

    public function wilayah_penjualan(){
        return $this->hasMany(Penjualan::class, "kode_wilayah");
    }
}
