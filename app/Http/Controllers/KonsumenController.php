<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Konsumen;
use Illuminate\Support\Facades\DB;
use App\Models\Wilayah;
use App\Models\Penjualan;
use App\Models\Pengiriman;
use App\Models\Bpkb_Stnk;

class KonsumenController extends Controller
{
    public function index(){
        $konsumen = Konsumen::paginate(20);
        return view('konsumen.index', compact('konsumen'));
    }

    public function create(){
        $wilayah = Wilayah::selectRaw("id, kode_wilayah, nama_wilayah, concat(wilayah.kode_wilayah, ' - ', wilayah.nama_wilayah) as 
            wilayah")->get();
        return view('konsumen.create', compact('wilayah'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'namaFileKtp' => 'mimes:jpg,jpeg,png|max:2048',
        ]);

        $nama = $request->nama_konsumen;
        $kodeNama = strtoupper(substr($nama, 0, 2) . substr(strrchr($nama, " "), 1, 1));
        $randomNumber = rand(1,9999);
        $hasilKode = $kodeNama . $randomNumber;

        if($request->hasFile('namaFileKtp')){
            $foto_ktp = $request->file('namaFileKtp');
            $ktp = $foto_ktp->getClientOriginalName();
            $foto_ktp->move('upload/foto_ktp/', $ktp);
        }

        $konsumen = Konsumen::create([
            'kode_konsumen' => $hasilKode,
            'nama' => $request->nama_konsumen,
            'wilayah' => $request->kode_wilayah,
            'alamat' => $request->alamat,
            'kecamatan' => $request->kecamatan,
            'no_ktp' => $request->no_ktp,
            'no_telp' => $request->no_telp,
            'namaFileKtp' => $ktp,
        ]);

        return redirect()->route('konsumen.index')
            ->with('success', 'Data Konsumen berhasil ditambahkan!');
    }

    public function show($id){
        $konsumen = Konsumen::find($id);
        return view('konsumen.show', compact('konsumen'));
    }

    public function edit($id){
        $konsumen = Konsumen::find($id);
        $wilayah = Wilayah::selectRaw("id, kode_wilayah, nama_wilayah, concat(wilayah.kode_wilayah, ' - ', wilayah.nama_wilayah) as 
            wilayah")->get();
        return view('konsumen.edit', compact('konsumen', 'wilayah'));
    }

    public function update(Request $request, $id){
        $konsumen = Konsumen::find($id);

        $this->validate($request,[
            'kode_konsumen' => 'required',
            'nama_konsumen' => 'required',
            'kode_wilayah' => 'required',
            'alamat' => 'required',
            'kecamatan' => 'required',
            'no_ktp' => 'required',
            'no_telp' => 'required',
            'namaFileKtp' => 'mimes:jpg,jpeg,png|max:2048',
        ]);

        if($request->hasFile('namaFileKtp')){
            $foto_ktp = $request->file('namaFileKtp');
            $fileKtp = $foto_ktp->getClientOriginalName();
            $foto_ktp->move('upload/foto_ktp/', $fileKtp);

            $konsumen->update([
                'kode_konsumen' => $request->kode_konsumen,
                'nama' => $request->nama_konsumen,
                'wilayah' => $request->kode_wilayah,
                'alamat' => $request->alamat,
                'kecamatan' => $request->kecamatan,
                'no_ktp' => $request->no_ktp,
                'no_telp' => $request->no_telp,
                'namaFileKtp' => $fileKtp,
                ]);
        }else{
            $konsumen->update([
                'kode_konsumen' => $request->kode_konsumen,
                'nama' => $request->nama_konsumen,
                'wilayah' => $request->kode_wilayah,
                'alamat' => $request->alamat,
                'kecamatan' => $request->kecamatan,
                'no_ktp' => $request->no_ktp,
                'no_telp' => $request->no_telp,
                ]);
        }

        

        return redirect()->route('konsumen.index')
            ->with('success', 'Data Konsumen Berhasil Diubah!');
    }
    
        public function destroy($id){
            $konsumen = Konsumen::find($id);
            $id_konsumen = $konsumen->id;

            $checkPenjualan = Penjualan::where('Penjualan.kode_customer',$id_konsumen)->get();
            
            if(sizeof($checkPenjualan)>0){
                return redirect()->route('konsumen.index')
                ->with('error', 'Data Konsumen tidak dapat dihapus!');
            }else{
                $konsumen->delete();
                return redirect()->route('konsumen.index')
                    ->with('success', 'Data Konsumen Berhasil Dihapus!');
            }
    }
}
