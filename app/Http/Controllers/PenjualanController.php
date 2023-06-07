<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Wilayah;
use App\Models\Gudang;
use App\Models\Barang;
use App\Models\Konsumen;
use App\Models\Penjualan;
use Carbon\Carbon;
use Validator;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class PenjualanController extends Controller
{
    public function index(){
        $dataPenjualan = Penjualan::paginate(10);
        return view('penjualan.index', compact('dataPenjualan'));
    }

    public function create(){
        $konsumen = Konsumen::selectRaw("id, kode_konsumen, nama")->get();
        $barang = Barang::where('status', 'TERSEDIA')
            ->selectRaw("id, nomor_rangka, nama_barang, warna, concat(barang.nomor_rangka, '-', barang.nama_barang, 
            '-', barang.warna) as barang_dijual")->get();
        $wilayah = Wilayah::selectRaw("id, kode_wilayah, nama_wilayah")->get();
        $gudang = Gudang::selectRaw("id, kode_gudang, nama_gudang")->get();
        $karyawan = User::selectRaw("id, kode_karyawan, nama_karyawan, concat(users.kode_karyawan, ' - ', users.nama_karyawan) as 
            karyawan")->where('status', 'Karyawan')->get();
        return view('penjualan.create', compact('konsumen', 'karyawan', 'barang', 'wilayah', 'gudang'));
    }

    public function store(Request $request){
        $i = 0001;
        $increments = ++$i;
        $tahunIni = Carbon::now();
        $tahunSekarang = date('y');
        $bulanSekarang = date('m');
        $kode_dealer = $request->kode_dealer;
        $nomorFJ = 'FJ-'. $kode_dealer . '-'. $tahunSekarang . '-'. $bulanSekarang . '-' . str_pad($increments, 4, '0', STR_PAD_LEFT); 
        $barang = Barang::find($request->nomor_rangka);
        
        $penjualan = Penjualan::create([
            'no_fj' => $nomorFJ,
            'kode_customer' => $request->kode_konsumen,
            'kode_wilayah' => $request->kode_wilayah,
            'kode_gudang' => $request->kode_gudang,
            'kode_karyawan' => $request->kode_karyawan,
            'nomor_rangka' => $request->nomor_rangka,
            'dealer' => $kode_dealer,
            'harga_terjual' => $request->harga,
            'jenis_bayar' => $request->jenis_bayar,
        ]);
    

        if($barang){
            $barang->status = "TERJUAL";
            $barang->save();
        }
        
        return redirect()->route('penjualan.index')
            ->with('success', 'Data Penjualan berhasil ditambahkan!'); 
        }

    public function download($id){
        $penjualan = Penjualan::find($id);
        $no_fj = Penjualan::find($id)->get('no_fj');
        $pdf = PDF::loadView('penjualan.fj', ['dataPenjualan' => $penjualan]);
        return $pdf->download('Faktur Jual' . $no_fj . '.pdf');
    }

    public function show($id){
        $penjualan = Penjualan::find($id);
        return view('penjualan.show', compact('penjualan'));
    }

    public function filter(Request $request){
        $hasil = Penjualan::join('barang', 'penjualan.nomor_rangka', '=', 'barang.id')
            ->where('barang.nama_barang', 'like', '%' . $request->input('name') . '%')->get();
        
            return view('penjualan.hasil', ['dataPenjualan' => $hasil]);
    }
}
