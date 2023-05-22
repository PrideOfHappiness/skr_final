<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Konsumen;
use App\Models\Wilayah;

class KonsumenController extends Controller
{
    public function index(){
        $konsumen = Konsumen::paginate(20);
        return view('konsumen.index', compact('konsumen'));
    }

    public function create(){
        $wilayah = Wilayah::selectRaw("kode_wilayah, nama_wilayah, concat(wilayah.kode_wilayah, ' - ', wilayah.nama_wilayah) as 
            wilayah")->get();
        return view('konsumen.create', compact('wilayah'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'nama_konsumen' => 'required',
            'kode_wilayah' => 'required',
            'alamat' => 'required',
            'kecamatan' => 'required',
            'no_ktp' => 'required',
            'no_telp' => 'required',
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

    public function show($kode_konsumen){
        $konsumen = Konsumen::where('kode_konsumen', $kode_konsumen)->first();
        return view('konsumen.show', compact('konsumen'));
    }

    public function edit($kode_konsumen){
        $konsumen = Konsumen::where('kode_konsumen', $kode_konsumen)->first();
        return view('konsumen.edit', compact('konsumen'));
    }

    public function update(Request $request, $kode_konsumen){
        $konsumen = Konsumen::where('kode_konsumen', $kode_konsumen)->get('kode_konsumen');

        $this->validate($request,[
            'nama_konsumen' => 'required',
            'kode_wilayah' => 'required',
            'alamat' => 'required',
            'kecamatan' => 'required',
            'no_ktp' => 'required',
            'no_telp' => 'required',
            'namaFileKtp' => 'required',
        ]);

        if($request->hasFile('namaFileKtp')){
            $foto_ktp = $request->file('foto_ktp_konsumen');
            $namaFileKtp = $foto_ktp->getClientOriginalName();
            $foto_ktp->move('upload/foto_ktp/', $namaFileKtp);
        }

        $konsumen->nama = $request->kode_konsumen;
        $konsumen->wilayah = $request->kode_wilayah;
        $konsumen->alamat = $request->alamat;
        $konsumen->kecamatan = $request->kecamatan;
        $konsumen->no_ktp = $request->no_ktp;
        $konsumen->no_telp = $request->no_telp;
        $konsumen->namaFileKtp = $request->namaFileKtp;
        $konsumen->update();
    }

    public function destroy($kode_konsumen){
        $konsumen = Konsumen::where('kode_konsumen', $kode_konsumen)->get();
        $konsumen->delete();

        return redirect()->route('konsumen.index')
            ->with('success', 'Data Konsumen Berhasil Dihapus!');
    }
}
