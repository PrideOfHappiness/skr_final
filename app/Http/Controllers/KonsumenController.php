<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Konsumen;
use Illuminate\Support\Facades\DB;
use App\Models\Wilayah;

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
        return view('konsumen.edit', compact('konsumen'));
    }

    public function update(Request $request){
        $konsumen = Konsumen::find($id);

        $this->validate($request,[
            'kode_konsumen' => 'required',
            'nama_konsumen' => 'required',
            'kode_wilayah' => 'required',
            'alamat' => 'required',
            'kecamatan' => 'required',
            'no_ktp' => 'required',
            'no_telp' => 'required',
            'namaFileKtp' => 'required|mimes:jpg,jpeg,png|max:2048',
        ]);

        if($request->hasFile('namaFileKtp')){
            $foto_ktp = $request->file('namaFileKtp');
            $fileKtp = $foto_ktp->getClientOriginalName();
            $foto_ktp->move('upload/foto_ktp/', $fileKtp);
        }

        $idkon->update([
            'kode_konsumen' => $request->kode_konsumen,
            'nama' => $request->nama_konsumen,
            'wilayah' => $request->kode_wilayah,
            'alamat' => $request->alamat,
            'kecamatan' => $request->kecamatan,
            'no_ktp' => $request->no_ktp,
            'no_telp' => $request->no_telp,
            'namaFileKtp' => $fileKtp,
            ]);

        return redirect()->route('konsumen.index')
            ->with('success', 'Data Konsumen Berhasil Diubah!');
    }
    
        public function destroy($id){
            $konsumen = Konsumen::find($id);
            $konsumen->delete();

            return redirect()->route('konsumen.index')
                ->with('success', 'Data Konsumen Berhasil Dihapus!');
    }
}
