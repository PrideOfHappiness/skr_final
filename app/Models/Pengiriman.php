<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DateTime;

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

    public function fj(){
        return $this->belongsTo(Penjualan::class, "no_fj");
    }

    public function pengirim(){
        return $this->belongsTo(User::class, "karyawan_pengirim");
    }

    public function getPDIShippingAttribute(){
        if($this->pdi_datetime && $this->shipping_datetime){
            $processedDateTime = DateTime::createFromFormat('Y-m-d H:i:s', $this->pdi_datetime);
            $shippedDateTime = DateTime::createFromFormat('Y-m-d H:i:s', $this->shipping_datetime);

            $durasi = $processedDateTime->diff($shippedDateTime);

            $jam = $durasi->h;
            $menit = $durasi->i;

            return $jam . ' jam' . $menit . ' menit';
        }
        return null;
    }

    public function getShippingSelesaiAttribute(){
        if($this->shipping_datetime && $this->selesai_datetime){
            $processedDateTime = DateTime::createFromFormat('Y-m-d H:i:s', $this->shipping_datetime);
            $shippedDateTime = DateTime::createFromFormat('Y-m-d H:i:s', $this->selesai_datetime);

            $durasi = $processedDateTime->diff($shippedDateTime);

            $jam = $durasi->h;
            $menit = $durasi->i;

            return $jam . ' jam ' . '  ' . $menit . ' menit';
        }
        return null;
    }
}
