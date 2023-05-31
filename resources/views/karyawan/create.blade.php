<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Tambah Data Karyawan</title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarAdmin')

    <div class="container">
        <div class="mt-2"> 
            <section class="content"> 
                <form action={{ route('karyawan.store') }} method="post"> 
                    @csrf
                    <div class="mb-3">
                        <label for="nama_karyawan" class="form-label">Nama Karyawan</label>
                        <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" placeholder="Nama Karyawan" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Jenis Kelamin</label>
                        <select name="gender" id="gender" class="form-control select2-multiple">
                            <option value="">Silahkan pilih jenis kelamin terlebih dahulu!</option>
                                <option value="L"> Laki-Laki </option>
                                <option value="P"> Perempuan </option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Jabatan</label>
                        <select name="status" id="status" class="form-control select2-multiple">
                            <option value="">Silahkan pilih jabatan terlebih dahulu!</option>
                                <option value="Karyawan"> Karyawan </option>
                                <option value="Admin"> Admin </option>
                                <option value="Pemilik"> Pemilik </option>
                                <option value="Karyawan Pengirim"> Karyawan Pengirim </option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="no_telp" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Nomor Telepon" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Karyawan</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email Karyawan" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </section>
        </div>
    </div>
    @include('template/footer')
</body>