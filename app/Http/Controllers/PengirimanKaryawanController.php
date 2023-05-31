<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengiriman;
use App\Models\User;
use Auth;

class PengirimanKaryawanController extends Controller
{
    public function index(){
        $pengirimanKaryawan = Pengiriman::where('karyawan_pengirim', Auth::id())->paginate(10);
        return view('pengirimanKaryawan.index', compact('pengirimanKaryawan'));
    }

    public function show($id){
        $pengirimanKaryawan = Pengiriman::find($id);
        return view('pengirimanKaryawan.show', compact('pengirimanKaryawan'));
    }

    public function selesai($id){
        $pengirimanKaryawan = Pengiriman::find($id);
        $pengirimanKaryawan->status = "Selesai";
        $pengirimanKaryawan->shipping_datetime = now();
        $pengirimanKaryawan->save();

        return redirect()->route('pengirimanKaryawan.index')
            ->with('success', 'Status Pengiriman berhasil diubah menjadi selesai!');
    }
}
