<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Wilayah;

class WilayahController extends Controller
{
    public function index(){
        $wilayah = Wilayah::all();
        return view('wilayah.index', compact('wilayah'));
    }

    public function create(){
        return view('wilayah.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'nama_wilayah' => 'required'
        ]);

        $kab_kota = $request->nama_wilayah;
        $kode = strtoupper(substr($kab_kota, 5, 3));
        $random_number = rand(1, 9999);
        $hasil = $kode . $random_number; 

        $wilayah = Wilayah::create([
            'kode_wilayah' => $hasil,
            'nama_wilayah' => $request->nama_wilayah,
        ]);

        return redirect()->route('wilayah.index')
            ->with('success', 'Data Wilayah berhasil ditambahkan!');
    }

    public function show($kode_wilayah){
        $wilayah = Wilayah::where('kode_wilayah', $kode_wilayah)->first();
        return view('wilayah.show', compact('wilayah'));
    }
}
