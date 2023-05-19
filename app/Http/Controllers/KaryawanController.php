<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class KaryawanController extends Controller
{
    public function index(){
        $dataKaryawan = User::paginate(10);
        return view('karyawan.index', compact('dataKaryawan'));
    }

    public function create(){
        return view('karyawan.create');
    }
}
