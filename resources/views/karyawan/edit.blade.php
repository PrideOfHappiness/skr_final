<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Ubah Data Karyawan</title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarAdmin')
    
    <div class="container"> 
        <div class="mt-4"> 
            <section class="content"> 
                <form action = "{{route('karyawan.update', $karyawan->id)}}" method="post"> 
                    @csrf
                    @method('PUT')
                    
                    <input type="hidden" id="user_id" name="user_id" required value="{{ auth()->user()->id }}">
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
                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $karyawan->alamat }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Jenis Kelamin</label>
                        <input type="text" class="form-control" id="gender" name="gender" value="{{ $karyawan->gender }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Jabatan</label>
                        <select name="status" id="status" class="form-control select2-multiple">
                            <option value={{$karyawan->status}}>{{ $karyawan->status}}</option>
                            <option value="">Silahkan pilih jabatan terlebih dahulu!</option>
                            <option value="Karyawan"> Karyawan </option>
                            <option value="Admin"> Admin </option>
                            <option value="Pemilik"> Pemilik </option>
                            <option value="Karyawan Pengirim"> Karyawan Pengirim </option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="no_telp" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{ $karyawan->no_telp }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Karyawan</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $karyawan->email }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Konfirmasi Password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </section>
        </div>
    </div>
    @include('template/footer')
</body>