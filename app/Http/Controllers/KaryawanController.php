<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Penjualan;
use App\Models\Pengiriman;
use App\Models\Bpkb_Stnk;
use Validator;

class KaryawanController extends Controller
{
    public function index(){
        $dataKaryawan = User::paginate(10);
        return view('karyawan.index', compact('dataKaryawan'));
    }

    public function create(){
        return view('karyawan.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'nama_karyawan' => 'required|unique:users,nama_karyawan',
            'alamat' => 'required',
            'gender' => 'required',
            'status' => 'required',
            'no_telp' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'confirm_password' => 'required',
        ]);

        //Potong nama dan generate angka random
        $nama = $request->nama_karyawan;
        $kodeNama = strtoupper(substr($nama, 0, 2) . substr(strrchr($nama, " "), 1, 1));
        $randomNumber = rand(1,9999);
        $hasilKode = $kodeNama . $randomNumber;

        //cek password
        $password1 = $request->password;
        $password2 = $request->confirm_password;

        if($password1 == $password2){
            $user = User::create([
                'kode_karyawan'=> $hasilKode,
                'nama_karyawan'=> $request->nama_karyawan,
                'alamat'=> $request->alamat,
                'gender'=> $request->gender,
                'status'=> $request->status,
                'no_telp'=> $request->no_telp,
                'email'=> $request->email,
                'password'=> bcrypt($password1),
            ]);
            return redirect()->route('karyawan.index')
                ->with('success', 'Data User berhasil ditambahkan!');
        } else if($password1 != $password2){
            return redirect()->route('karyawan.index')
                ->with('error', 'Password tidak cocok!');
        } else{
            return redirect()->route('karyawan.create')
                ->with('error', "Wajib masukkan password 2!");
        }   
    }

    public function show($id){
        $karyawan = User::find($id);
        return view('karyawan.show', compact('karyawan'));
    }

    public function edit($id){
        $karyawan = User::find($id);
        return view('karyawan.edit', compact('karyawan'));
    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'nama_karyawan' => 'required',
            'alamat' => 'required',
            'gender' => 'required',
            'status' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'password' => 'required',
            'confirm_password' => 'required',
        ]);
        $karyawan = User::find($id);
        $password1 = $request->password;
        $password2 = $request->confirm_password;

        if($password1 == $password2){
            $karyawan->kode_karyawan = $request->kode_karyawan;
            $karyawan->nama_karyawan = $request->nama_karyawan;
            $karyawan->alamat = $request->alamat;
            $karyawan->gender = $request->gender;
            $karyawan->status = $request->status;
            $karyawan->no_telp = $request->no_telp;
            $karyawan->email = $request->email;
            $karyawan->password = $password1;
            $karyawan->update();

            return redirect()->route('karyawan.index')
                ->with('success', 'Data Karyawan berhasil diubah!');
        }else if($password1 != $password2){
            return redirect()->route('karyawan.create')
                ->with('error', 'Password tidak cocok! Silahkan masukkan password yang benar.');
        } else{
            return redirect()->route('karyawan.create')
                ->with('error', "Cek kembali data anda!");
        }   
    }

    public function destroy($id){
        $karyawan = User::find($id);
        $id_karyawan = $karyawan->id;

        $checkPenjualan = Penjualan::where('Penjualan.kode_karyawan',$id_karyawan)->get();
        $checkPengiriman = Pengiriman::where('Pengiriman.karyawan_pengirim',$id_karyawan)->get();
        $checkBPKB = Bpkb_Stnk::where('Bpkb_Stnk.karyawan_cetak_surat_stnk',$id_karyawan)->get();
        if (sizeof($checkPenjualan)>0 || sizeof($checkPengiriman)>0 || sizeof($checkBPKB)>0){
            return redirect()->route('karyawan.index')
            ->with('error', 'Data Karyawan tidak dapat dihapus!');
        }else{
            $karyawan->delete();
            return redirect()->route('karyawan.index')
            ->with('success', 'Data Karyawan Berhasil Dihapus!');
        }



    }
}
