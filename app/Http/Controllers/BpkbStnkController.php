<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\Bpkb_Stnk;
use App\Models\User;
use Auth;
use PDF;
use Carbon\Carbon;

class BpkbStnkController extends Controller
{
    public function index(){
        $bpkb_stnk = Bpkb_Stnk::paginate(10);
        return view('bpkbStnk.index', compact('bpkb_stnk'));
    }

    public function create(){
        $penjualan = Penjualan::join('barang', 'penjualan.nomor_rangka', '=', 'barang.id')
            ->join('konsumen', 'penjualan.kode_customer', '=', 'konsumen.id')
            ->selectRaw("penjualan.id, penjualan.no_fj, konsumen.nama, barang.nama_barang,
            concat(penjualan.no_fj, '-', konsumen.nama, '-', barang.nama_barang) as penjualan")
            ->get();
        return view('bpkbStnk.create', compact('penjualan'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'penjualan' => 'required',
            'nopol_sementara' => 'required',
        ]);

        $bpkb_stnk = Bpkb_Stnk::create([
            'no_plat' => $request->nopol_sementara,
            'no_fj' => $request->penjualan,
            'status_bpkb' => 'Sedang diadministrasikan',
            'status_stnk_plat' => 'Sedang diadministrasikan',
        ]);

        return redirect()->route('bpkb_stnk.index')
            ->with('success', 'Data BPKB dan STNK sementara berhasil ditambahkan!');
    }

    public function show($id){
        $bpkb_stnk = Bpkb_Stnk::find($id);
        return view('bpkbStnk.show', compact('bpkb_stnk'));
    }

    public function edit($id){
        $bpkb_stnk = Bpkb_Stnk::find($id);
        return view('bpkbStnk.edit', compact('bpkb_stnk'));
    }

    public function update(Request $request, $id){
        $bpkb_stnk = Bpkb_Stnk::find($id);
        if(isset($_POST['jenis'])){
            $jenis = $_POST['jenis'];

            if($jenis == 'stnk'){
                $bpkb_stnk->no_plat = $request->nopol;
                $bpkb_stnk->nama_pengambil_stnk = $request->namaPengambil;
                $bpkb_stnk->alamat_pengambil_stnk = $request->alamat_pengambil;
                $bpkb_stnk->ktp_pengambil_stnk = $request->ktp_pengambil;
                $bpkb_stnk->status_stnk_plat = "Selesai";
                $bpkb_stnk->tgl_ambil_stnk_plat = Carbon::now();
                $bpkb_stnk->update();

                return redirect()->route('bpkb_stnk.index')
                    ->with('success', 'Data Nopol dan Data Pengambil Berhasil Diubah!');
            } else if($jenis == 'bpkb'){
                $bpkb_stnk->nomor_bpkb = $request->no_bpkb;
                $bpkb_stnk->status_bpkb = "Selesai";
                $bpkb_stnk->tgl_ambil_bpkb = Carbon::now();
                $bpkb_stnk->update();

                return redirect()->route('bpkbstnk.index')
                    ->with('success', 'Data BPKB Berhasil ditambahkan!');
            }
        } else{
            return redirect()->route('bpkb_stnk.edit')
                ->with('error', 'Jenis Administrasi Tidak Ditekan!');
        }
    }

    public function downloadStnk($id){
        $stnk = Bpkb_Stnk::find($id);
        //$stnk->status_stnk_plat = 'Sudah Diambil';
        $stnk->tgl_ambil_stnk_plat = now();
        $stnk->karyawan_cetak_surat_stnk = Auth::id();
        $stnk->save();
        //dd($stnk);
        $pdf = PDF::loadview('bpkbStnk.ambilSTNK', ['datastnk'=>$stnk]);
        return $pdf->download('Surat pernyataan ambil STNK.pdf');
    }

    public function downloadBpkb($id){
        $bpkb = Bpkb_Stnk::find($id);
        //$bpkb->status_bpkb = 'Sudah Diambil';
        $bpkb->tgl_ambil_bpkb = now();
        $bpkb->karyawan_cetak_surat_bpkb = Auth::id();
        $bpkb->save();

        $pdf = PDF::loadview('bpkbStnk.ambilBPKB', ['databpkb'=>$bpkb]);
        return $pdf->download('Surat pernyataan ambil BPKB.pdf');
    }


}
