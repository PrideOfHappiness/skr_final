<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengiriman;
use Carbon\Carbon;

class RekapPengirimanController extends Controller
{
    public function pickData(){
        return view('rekapPengiriman.pickData');
    }

    public function hasil(Request $request){
        $awal = Carbon::createFromFormat('Y-m-d H:i:s', $request->date('dataAwal'))->startOfDay();
        $akhir = Carbon::createFromFormat('Y-m-d H:i:s', $request->date('dataAkhir'))->endOfDay();

        $data = Pengiriman::whereBetween('created_at', [$awal, $akhir])->get();
        return view('rekapPengiriman.hasil', compact('data'));
    }
}
