<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bpkb_Stnk extends Model
{
    use HasFactory;

    protected $table = 'bpkb_stnk';

    protected $fillable = [
        'no_plat', 
        'no_fj',
        'nomor_bpkb',
        'status_bpkb',
        'status_stnk_plat',
        'nama_pengambil_stnk',
        'alamat_pengambil_stnk',
        'ktp_pengambil_stnk',
        'tgl_ambil_stnk_plat',
        'tgl_ambil_bpkb',
        'karyawan_cetak_surat_bpkb',
        'karyawan_cetak_surat_stnk',
    ];

    public function penjualan(){
        return $this->belongsTo(Penjualan::class, "no_fj");
    }

    public function karyawancetakbpkb(){
        return $this->belongsTo(User::class, "karyawan_cetak_surat_bpkb");
    }

    public function karyawancetakstnk(){
        return $this->belongsTo(User::class, "karyawan_cetak_surat_stnk");
    }
}
