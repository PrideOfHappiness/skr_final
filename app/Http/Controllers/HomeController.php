<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Barang;
use App\Models\Penjualan;
use App\Models\Pengiriman;
use App\Models\Bpkb_Stnk;
use App\Models\Konsumen;
use DB;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function adminHome()
    {
        $karyawanAll = User::select('kode_karyawan')->count();
        $barangTersediaAll = Barang::select('no_rangka')->where('status', 'TERSEDIA')->count();
        $barangTerjualAll = Barang::select('no_rangka')->where('status', 'TERJUAL')->count();

        return view('dashboard.admin')->with('karyawanAll', $karyawanAll)->with('barangTersedia', $barangTersediaAll)
            ->with('barangTerjual', $barangTerjualAll);
        
    }

    public function karyawanHome()
    {
        $konsumen = Konsumen::select('kode_konsumen')->count();
        $penjualan = Penjualan::select('no_fj')->count();
        $pengirimanBerlangsung = Pengiriman::where('status', 'Barang Sedang Dikirim')->count();
        $pengirimanSelesai = Pengiriman::where('status', 'Selesai')->count();

        return view('dashboard.karyawan', compact('konsumen', 'penjualan', 'pengirimanBerlangsung', 'pengirimanSelesai'));
    }

    public function pemilikHome()
    {
        $chartPenjualan = Penjualan::join('barang', 'penjualan.nomor_rangka', '=', 'barang.id')
            ->select('barang.nama_barang', DB::raw('count(penjualan.no_fj) as total'))
            ->groupBy('barang.nama_barang')->get();
        
        $labelPenjualan = $chartPenjualan->pluck('nama_barang');
        $dataPenjualan = $chartPenjualan->pluck('total');

        $chartPengiriman = Pengiriman::selectRaw("YEAR(surat_jalan) as tahun, MONTH(surat_jalan) as bulan, count(*) as total")
            ->groupBy('tahun', 'bulan')->get();
        
        $chartDataPengiriman = [];
        foreach($chartPengiriman as $data){
            $tahun = $data->tahun;
            $bulan = $data->bulan;
            $total = $data->total;

            $chartDataPengiriman[$tahun][$bulan] = $total;
        }
        return view('dashboard.pemilik', compact('labelPenjualan', 'dataPenjualan', 'chartDataPengiriman'));
    }

    public function karyawanPengirimHome(){
        $pengirimanBerlangsung = Pengiriman::where('karyawan_pengirim', Auth::id())->where('status', '!=', 'Selesai')->count();
        $pengirimanSelesai = Pengiriman::where('karyawan_pengirim', Auth::id())->where('status', '=', 'Selesai')->count();
        return view('dashboard.karyawanPengirim', compact('pengirimanBerlangsung', 'pengirimanSelesai'));
    }

}
