<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Pengiriman extends Model
{
    use HasFactory;
    protected $table = 'pengiriman';

    protected $fillable = [
        'surat_jalan',
        'no_fj',
        'karyawan_pengirim',
        'perlengkapan',
        'status',
        'pdi_datetime',
        'shipping_datetime',
        'selesai_datetime',
    ];

    public function no_fj(){
        return $this->belongsTo(Penjualan::class, "no_fj");
    }

    public function karyawan_pengirim(){
        return $this->belongsTo(User::class, "karyawan_pengirim");
    }

    public function getPDIShippingAttribute(){
        if($this->pdi_datetime && $this->shipping_datetime){
            return $this->pdi_datetime->diff($this->shipping_datetime);

            $jam = $durasi->h;
            $menit = $durasi->i;

            return $jam . 'jam' . $menit . 'menit';
        }
        return null;
    }

    public function getShippingSelesaiAttribute(){
        if($this->shipping_datetime && $this->selesai_datetime){
            $durasi = $this->shipping_datetime->diff($this->selesai_datetime);

            $jam = $durasi->h;
            $menit = $durasi->i;

            return $jam . 'jam' . $menit . 'menit';
        }
        return null;
    }
}
