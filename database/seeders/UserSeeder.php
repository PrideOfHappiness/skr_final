<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $karyawan = [
            [
            'kode_karyawan' => 'K0000001',
            'nama_karyawan' => 'Test Karyawan 1',
            'alamat' => 'Jl. Hayam Wuruk 58 Tanggung, Wlingi, Blitar',
            'gender' => 'P',
            'status' => 'Karyawan',
            'no_telp' => '085700088832',
            'password' => bcrypt('karyawan123'),
            'email' => 'karyawan123@gmail.com'
            ],
            [
            'kode_karyawan' => 'A0000001',
            'nama_karyawan' => 'Test Admin 1',
            'alamat' => 'Jl. Hayam Wuruk 59 Tanggung, Wlingi, Blitar',
            'gender' => 'L',
            'status' => 'Admin',
            'no_telp' => '085700088832',
            'password' => bcrypt('admin123'),
            'email' => 'tesadmin123@gmail.com',
            ],
            [
            'kode_karyawan' => 'P0000001',
            'nama_karyawan' => 'Test Pemilik 1',
            'alamat' => 'Jl. Hayam Wuruk 59 Tanggung, Wlingi, Blitar',
            'gender' => 'L',
            'status' => 'Pemilik',
            'no_telp' => '085700088832',
            'password' => bcrypt('pemilik123'),
            'email' => 'margakartika369@gmail.com'
            ],
        ];

        foreach($karyawan as $key=>$user){
            User::create($user);
        }
    }
}
