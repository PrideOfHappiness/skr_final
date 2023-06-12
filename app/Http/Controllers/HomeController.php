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
        $tahun = date('y');
        $bulan = date('m');
        $konsumen = Konsumen::select('kode_konsumen')->count();
        $penjualan = Penjualan::select('no_fj')
            ->whereYear('no_fj', $tahun)->whereMonth('no_fj', $bulan)->count();
        $pengirimanBerlangsung = Pengiriman::where('status', 'Barang Sedang Dikirim')->
            whereYear('surat_jalan', $tahun)->whereMonth('surat_jalan', $bulan)->count();
        $pengirimanSelesai = Pengiriman::where('status', 'Selesai')
            ->whereYear('surat_jalan', $tahun)->whereMonth('surat_jalan', $bulan)->count();

        return view('dashboard.karyawan', compact('konsumen', 'penjualan', 'pengirimanBerlangsung', 'pengirimanSelesai'));
    }

    public function pemilikHome()
    {
        //Penjualan
        $chartPenjualan = Penjualan::join('barang', 'penjualan.nomor_rangka', '=', 'barang.id')
            ->select('barang.nama_barang', DB::raw('count(penjualan.no_fj) as total'))
            ->groupBy('barang.nama_barang')->get();
        
        $labelPenjualan = $chartPenjualan->pluck('nama_barang');
        $dataPenjualan = $chartPenjualan->pluck('total');

        //Pengiriman
        $chartPengiriman = Pengiriman::selectRaw("YEAR(surat_jalan) as tahun, MONTH(surat_jalan) as bulan, count(*) as total")
            ->groupBy('tahun', 'bulan')->get();
        
        $chartDataPengiriman = [];
        foreach($chartPengiriman as $data){
            $tahun = $data->tahun;
            $bulan = $data->bulan;
            $total = $data->total;

            $chartDataPengiriman[$tahun][$bulan] = $total;
        }

        //GrowthPenjualanYoY
        $penjualanTahunSebelumnya = Penjualan::whereYear('created_at', date('Y') - 1)->count();
        $penjualanTahunIni = Penjualan::whereYear('created_at', date('Y'))->count();

        $growthPenjualanYoY =  0 . '%';
        if($penjualanTahunSebelumnya != 0){
            $growthPenjualanYoY = (($penjualanTahunIni - $penjualanTahunSebelumnya) / $penjualanTahunSebelumnya) * 100;
        }else{
            $growthPenjualanYoY = ($penjualanTahunIni) * 100;
        }

        //GrowthPenjualanMoM
        $penjualanTahunBulanSebelumnya = Penjualan::whereYear('created_at', date('Y') - 1)
            ->whereMonth('created_at', date('m'))->count();
        $penjualanTahunBulanIni = Penjualan::whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))->count();

        $growthPenjualanMoM = 0 . '%';
        if($penjualanTahunBulanSebelumnya != 0){
            $growthPenjualanMoM = (($penjualanTahunBulanIni - $penjualanTahunBulanSebelumnya) / $penjualanTahunBulanSebelumnya) * 100;
        }else{
            $growthPenjualanMoM = ($penjualanTahunBulanIni) * 100;
        }

        //GrowthPenjualanMovM
        $penjualanBulanSebelumnya = Penjualan::whereMonth('created_at', date('m') - 1)->count();
        $penjualanBulanIni = Penjualan::whereMonth('created_at', date('m'))->count();

        $growthPenjualanMovM =  0 . '%';
        if($penjualanBulanSebelumnya !=0){
            $growthPenjualanMovM = (($penjualanBulanIni - $penjualanBulanSebelumnya) / $penjualanBulanSebelumnya) * 100;
        }else{
            $growthPenjualanMovM = ($penjualanBulanIni) * 100;
        }


        return view('dashboard.pemilik', compact('labelPenjualan', 'dataPenjualan', 'chartDataPengiriman', 'growthPenjualanYoY', 
        'growthPenjualanMoM', 'growthPenjualanMovM'));
    }

    public function karyawanPengirimHome(){
        $pengirimanBerlangsung = Pengiriman::where('karyawan_pengirim', Auth::id())->where('status', '!=', 'Selesai')->count();
        $pengirimanSelesai = Pengiriman::where('karyawan_pengirim', Auth::id())->where('status', '=', 'Selesai')->count();
        return view('dashboard.karyawanPengirim', compact('pengirimanBerlangsung', 'pengirimanSelesai'));
    }

}
