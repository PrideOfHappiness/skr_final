<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengiriman;
use App\Models\User;
use Auth;

class PengirimanKaryawanController extends Controller
{
    public function index(){
        $pengirimanKaryawan = Pengiriman::where('karyawan_pengirim', Auth::id())->where('status', '!=', 'Selesai')->paginate(10);
        return view('pengirimanKaryawan.index', compact('pengirimanKaryawan'));
    }

    public function show($id){
        $pengirimanKaryawan = Pengiriman::find($id);
        return view('pengirimanKaryawan.show', compact('pengirimanKaryawan'));
    }

    public function selesai($id){
        $pengirimanKaryawan = Pengiriman::find($id);
        if($pengirimanKaryawan->selesai_datetime){
            return redirect('/karyawanPengirim/pengiriman');    
        }else{
            $pengirimanKaryawan->status = "Selesai";
            $pengirimanKaryawan->selesai_datetime = now();
            $pengirimanKaryawan->save();
            return redirect('/karyawanPengirim/pengiriman')
                ->with('success', 'Status Pengiriman berhasil diubah menjadi selesai!');
        }
    }

    public function riwayatPengiriman(){
        $riwayatPengiriman = Pengiriman::all();
        return view('karyawanPengirim.histori', compact('riwayat_pengiriman'));
    }
}
