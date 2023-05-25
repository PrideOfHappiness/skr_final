<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengiriman;

class PengirimanController extends Controller
{
    public function index(){
        $pengiriman = Pengiriman::paginate(20);
        return view('pengiriman.index', compact('pengiriman'));
    }

    public function create(){
        
    }
}
