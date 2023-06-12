<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;

class GrowthPenjualanController extends Controller
{
    public function yoy(){
        $penjualanTahunSebelumnya = Penjualan::whereYear('created_at', date('Y') - 1)->count();
        $penjualanTahunIni = Penjualan::whereYear('created_at', date('Y'))->count();

        $growthPenjualanYoY = 0;
        if($penjualanTahunSebelumnya != 0){
            $growthPenjualanYoY = (($penjualanTahunIni - $penjualanTahunSebelumnya) / $penjualanTahunSebelumnya) * 100;
        }
        
        return view('growthPenjualan.index', compact('growthPenjualanYoY'));
    }

    public function mom(){
        $penjualanTahunBulanSebelumnya = Penjualan::whereYear('created_at', date('Y') - 1)
            ->whereMonth('created_at', date('m'))->count();
        $penjualanTahunBulanIni = Penjualan::whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))->count();

        $growthPenjualanMoM = 0;
        if($penjualanTahunBulanSebelumnya != 0){
            $growthPenjualanMoM = (($penjualanTahunBulanIni - $penjualanTahunBulanSebelumnya) / $penjualanTahunBulanSebelumnya) * 100;
        }
        return view('growthPenjualan.index', compact('growthPenjualanMom'));
    }


}
