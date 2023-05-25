<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\Barang;
use App\Models\Wilayah;
use App\Models\Konsumen;
use App\Models\Gudang;
use App\Models\User;
use Illuminate\Support\Facade\DB;
use Carbon\Carbon;

class LaporanPenjualanController extends Controller
{
    public function pickData(){
            return view("laporanPenjualan/pickData");
    }
    
        public function prosesTanggalSepedaMotor(Request $request){
            $awal = Carbon::createFromFormat('Y-m-d H:i:s', $request->date('dataAwal'))->startOfDay();
            $akhir = Carbon::createFromFormat('Y-m-d H:i:s', $request->date('dataAkhir'))->endOfDay();

            $data = Penjualan::selectRaw("barang.nama_barang as nama, count(penjualan.created_at) as jumlah_barang")
                ->join('barang', 'penjualan.nomor_rangka', '=', 'barang.id')
                ->whereBetween('penjualan.created_at', [$awal, $akhir])
                ->groupBy('barang.nama_barang')->get();

            $chartData = [];
            foreach($data as $row){
                $chartData['label'][] = $row->nama;
                $chartData['jumlah'][] = (int) $row->jumlah_barang;
            }

            $chartData['chart_data'] = json_encode($chartData);
            return view('laporanPenjualan.hasil', $chartData)
                ->with('awal', $awal)
                ->with('akhir', $akhir);
    }

    public function index(){

    }
}
