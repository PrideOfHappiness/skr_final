<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Tambah Data Konsumen</title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarKaryawan')

    <div class="mb-3">
        <label for="nama_konsumen" class="form-label">Nama Konsumen</label>
        <input type="text" class="form-control" id="nama_konsumen" name="nama_konsumen" value="{{ $konsumen->nama }}" readonly>
    </div>
    <div class="mb-3">
        <label for="wilayah_asal" class="form-label">Wilayah</label>
        <input type="text" class="form-control" id="wilayah_asal" name="wilayah_asal" value="{{ $konsumen->kode_wilayah->nama_wilayah }}"
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $konsumen->alamat }}" readonly>
    </div>
    <div class="mb-3">
        <label for="kecamatan" class="form-label">Kecamatan</label>
        <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="{{ $konsumen->kecamatan }}" readonly>
    </div>
    <div class="mb-3">
        <label for="no_ktp" class="form-label">Nomor KTP</label>
        <input type="text" class="form-control" id="no_ktp" name="no_ktp" value="{{ $konsumen->no_ktp }}" readonly>
    </div>
    <div class="mb-3">
        <label for="no_telp" class="form-label">Nomor Telepon</label>
        <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{ $konsumen->no_telp }}" readonly>
    </div>
    <div class="mb-3">
        <label for="no_telp" class="form-label">Foto KTP</label>
        <img width="150px" src="{{ url('upload/foto_ktp/'.  $konsumen->namaFileKtp) }}">
    </div>
    @include('template/footer')
</body>
</html>