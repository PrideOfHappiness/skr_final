<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Imports\ImportBarang;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class BarangController extends Controller
{
    public function index(){
        $barang = Barang::where('status', 'Tersedia')->paginate(20);
        return view('barang.index', compact('barang'));
    }

    public function indexAll(){
        $barang = Barang::paginate(20);
        return view('barang.indexAll', compact('barang'));
    }

    public function indexKaryawan(){
        $barang = Barang::where('status', 'Tersedia')->paginate(20);
        return view('barang.indexKaryawan', compact('barang'));
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

    public function show($id){
        $barang = Barang::find($id);
        return view('barang.show', compact('barang'));
    }

    public function showKaryawan($id){
        $barang = Barang::find($id);
        return view('barang.showKaryawan', compact('barang'));
    }

    public function filter(Request $request){
        $item = Barang::query();
        $kategori = $request->kategori;
        $status = $request->status;
        $tanggalAwal = $request->input('dataAwal');
        $tanggalAkhir = $request->input('dataAkhir');
        
        $kriteria = [];
        if($kategori){
            $kriteria[] = ['jenis', '=', $kategori];
        }
        if($status){
            $kriteria[] = ['status', '=', $status];
        }
        if($tanggalAwal && $tanggalAkhir){
            $kriteria[] = ['updated_at', '>=', Carbon::createFromFormat('Y-m-d H:i:s', $request->date('dataAwal'))->startOfDay()];
            $kriteria[] = ['updated_at', '<=', Carbon::createFromFormat('Y-m-d H:i:s', $request->date('dataAkhir'))->endOfDay()];
        }

        $hasil = $item->where($kriteria)->get();          
        return view('barang.hasil')->with('hasil', $hasil);
    }

    public function filterKaryawan(Request $request){
        $item = Barang::query();
        $kategori = $request->kategori;
        $tanggalAwal = $request->input('dataAwal');
        $tanggalAkhir = $request->input('dataAkhir');


        $kriteria = [];
        if($kategori){
            $kriteria[] = ['jenis', '=', $kategori];
            $kriteria[] = ['status', '=' , 'TERSEDIA'];
        }

        if($tanggalAwal && $tanggalAkhir){
            $kriteria[] = ['updated_at', '>=', Carbon::createFromFormat('Y-m-d H:i:s', $request->date('dataAwal'))->startOfDay()];
            $kriteria[] = ['updated_at', '<=', Carbon::createFromFormat('Y-m-d H:i:s', $request->date('dataAkhir'))->endOfDay()];
        }

        $hasil = $item->where($kriteria)->get();

        return view('barang.hasil')->with('hasil', $hasil);
    }
}
