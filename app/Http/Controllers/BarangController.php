<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Imports\ImportBarang;
use Maatwebsite\Excel\Facades\Excel;

class BarangController extends Controller
{
    public function index(){
        $barang = Barang::paginate(20);
        return view('barang.index', compact('barang'));
    }

    public function create(){
        return view('barang.create');
    }

    public function importDataBarang(){
        return view('barang.importData');
    }

    public function store(Request $request){
        $this->validate($request, [
            'no_rangka' => 'required',
            'no_mesin' => 'required',
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'jenis' => 'required',
            'warna' => 'required',
            'tahun_rakit' => 'required',
        ]);

        Barang::create([
            'nomor_rangka' => $request->no_rangka,
            'nomor_mesin' => $request->no_mesin,
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'jenis' => $request->jenis,
            'warna' => $request->warna,
            'tahun_rakit' => $request->tahun_rakit,
            'status' => 'TERSEDIA',
        ]);

        return redirect()->route('barang.index')
            ->with('success', 'Data Barang berhasil ditambahkan!');

    }

    public function import(Request $request){
        Excel::import(new ImportBarang, $request->file('file_excel')->store('files'));
        return redirect('/admin/barang');
    }

    public function show($nomor_rangka){
        $barang = Barang::where('nomor_rangka', $nomor_rangka)->first();
        return view('barang.show', compact('barang'));
    }
}
