<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Penjualan;
use Carbon\Carbon;

class LaporanPenjualanKaryawanController extends Controller
{
    public function pickData(){
        return view("laporanKaryawan/pickData");
}

    public function prosesTanggalKaryawan(Request $request){
        $awal = Carbon::createFromFormat('Y-m-d H:i:s', $request->date('dataAwal'))->startOfDay();
        $akhir = Carbon::createFromFormat('Y-m-d H:i:s', $request->date('dataAkhir'))->endOfDay();

        $data = Penjualan::selectRaw("users.nama_karyawan as nama, count(penjualan.created_at) as jumlah_barang")
            ->join('users', 'penjualan.kode_karyawan', '=', 'users.id')
            ->whereBetween('penjualan.created_at', [$awal, $akhir])
            ->groupBy('users.nama_karyawan')->get();

        $chartData = [];
        foreach($data as $row){
            $chartData['label'][] = $row->nama;
            $chartData['jumlah'][] = (int) $row->jumlah_barang;
        }

        $chartData['chart_data'] = json_encode($chartData);
        return view('laporanKaryawan.hasil', $chartData)
            ->with('awal', $awal)
            ->with('akhir', $akhir);
    }
}
