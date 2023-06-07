<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use Carbon\Carbon;

class RekapPenjualanController extends Controller
{
    public function pickData(){
        return view('rekapPenjualan.pickData');
    }

    public function hasil(Request $request){
        $awal = Carbon::createFromFormat('Y-m-d H:i:s', $request->date('dataAwal'))->startOfDay();
        $akhir = Carbon::createFromFormat('Y-m-d H:i:s', $request->date('dataAkhir'))->endOfDay();

        $data = Penjualan::whereBetween('created_at', [$awal, $akhir])->get();
        return view('rekapPenjualan.hasil', compact('data'));
    }
}
