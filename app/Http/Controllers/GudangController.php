<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gudang;

class GudangController extends Controller
{
    public function index(){
        $gudang = Gudang::all();
        return view('gudang.index', compact('gudang'));
    }

    public function create(){
        return view('gudang.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'nama_gudang' => 'required',
            'alamat' => 'required',
        ]);

        $i = 1;
        $increments = ++$i;
        $nama_gudang = 'S'. str_pad($increments, 4, '0', STR_PAD_LEFT);

        Gudang::create([
            'kode_gudang' => $nama_gudang,
            'nama_gudang' => $request->nama_gudang,
            'alamat_gudang' => $request->alamat,
        ]);

        return redirect()->route('gudang.index')
            ->with('success', 'Data Gudang berhasil ditambahkan!'); 
    }

    public function show($kode_gudang){
        $gudang = Gudang::where('kode_gudang', $kode_gudang)->first();
        return view('gudang.show', compact('gudang'));
    }
}
