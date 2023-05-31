<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Detail Data {{ $karyawan->nama_karyawan }} </title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarAdmin')

    <div class="container"> 
        <div class="mt-4"> 
            <section class="content"> 
                <div class="mb-3">
                    <label for="kode_karyawan" class="form-label">Kode Karyawan</label>
                    <input type="text" class="form-control" id="kode_karyawan" name="kode_karyawan" value="{{ $karyawan->kode_karyawan }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="nama_karyawan" class="form-label">Nama Karyawan</label>
                    <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" value="{{ $karyawan->nama_karyawan }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $karyawan->alamat }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="gender" class="form-label">Jenis Kelamin</label>
                    <input type="text" class="form-control" id="gender" name="gender" value="{{ $karyawan->gender }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="no_telp" class="form-label">Nomor Telepon</label>
                    <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{ $karyawan->no_telp }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email Karyawan</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $karyawan->email }}" readonly>
                </div>
            </section>
        </div>
    </div>
    @include('template/footer')
</body>