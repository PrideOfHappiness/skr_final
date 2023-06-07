<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'kode_karyawan',
        'nama_karyawan',
        'alamat',
        'gender',
        'status',
        'no_telp',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function karyawan_penjualan(){
        return $this->hasMany(Penjualan::class, "kode_karyawan");
    }

    public function karyawan_pengiriman(){
        return $this->hasMany(Pengiriman::class, "karyawan_pengirim");
    }

    public function karyawan_bpkb(){
        return $this->hasMany(Bpkb_Stnk::class, "karyawan_cetak_surat_bpkb");
    }

    public function karyawan_stnk(){
        return $this->hasMany(Bpkb_Stnk::class, "karyawan_cetak_surat_stnk");
    }
}
