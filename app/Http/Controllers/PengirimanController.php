<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengiriman;
use App\Models\Penjualan;
use App\Models\Barang;
use App\Models\Konsumen;
use App\Models\User;
use PDF;
use Carbon\Carbon;

class PengirimanController extends Controller
{
    public function index(){
        $pengiriman = Pengiriman::paginate(20);
        return view('pengiriman.index', compact('pengiriman'));
    }

    public function create(){
        $penjualan = Penjualan::join('barang', 'penjualan.nomor_rangka', '=', 'barang.id')
            ->join('konsumen', 'penjualan.kode_customer', '=', 'konsumen.id')
            ->selectRaw("penjualan.id, penjualan.no_fj, konsumen.nama, barang.nama_barang,
            concat(penjualan.no_fj, '-', konsumen.nama, '-', barang.nama_barang) as penjualan")
            ->get();
        $karyawan = User::selectRaw("id, kode_karyawan, nama_karyawan, concat(users.kode_karyawan, '-', 
            users.nama_karyawan) as karyawan")->where('status', 'Karyawan Pengirim')->get();
        return view('pengiriman.create', compact('penjualan', 'karyawan'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'penjualan' => 'required',
            'karyawan_pengirim' => 'required',
            'perlengkapan' => 'required',
        ]);

        $i = 1;
        $increments = $i++;
        $tahun = date('Y');
        $suratJalan = 'SJ-'. $tahun . $increments;
        $carbon = Carbon::now();

        $pengiriman = Pengiriman::create([
            'surat_jalan' => $suratJalan,
            'no_fj' => $request->penjualan,
            'karyawan_pengirim' -> $request->karyawan_pengirim,
            'perlengkapan' => $request->perlengkapan,
            'status' => 'PDI',
            'pdi_datetime' => $carbon,
        ]);

        return redirect()->route('pengiriman.index')
            ->with('success', 'Data Pengiriman berhasil ditambahkan!');  
    }

    public function download($id){
        $pengiriman = Pengiriman::find($id);
        $pdf = PDF::loadView('pengiriman.suratJalan', ['dataPengiriman' => $pengiriman]);
        return $pdf->download('Surat Jalan.pdf');
    }

    public function show($id){
        $pengiriman = Pengiriman::find($id);
        return view('pengiriman.show', compact('pengiriman'));
    }

    public function ubahPengiriman($id){
        $pengiriman = Pengiriman::find($id);
        $pengiriman->status = "Barang Sedang Dikirim";
        $pengiriman->shipping_datetime = now();
        $pengiriman->save();

        return redirect()->route('pengiriman.index')
            ->with('success', 'Status Pengiriman berhasil diubah menjadi sedang dikirim!');
    }
}
