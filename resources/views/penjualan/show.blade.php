<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Lihat Data Penjualan {{ $penjualan->no_fj}} </title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarKaryawan')

    <div class="container"> 
        <div class="mt-4"> 
            <section class="content"> 
                <div class="mb-3">
                    <label for="nama_konsumen" class="form-label">Nomor Faktur Jual</label>
                    <input type="text" class="form-control" id="nama_konsumen" name="nama_konsumen" value="{{ $penjualan->no_fj }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="wilayah_asal" class="form-label">Konsumen</label>
                    <input type="text" class="form-control" id="wilayah_asal" name="wilayah_asal" value="{{ $penjualan->konsumen->nama }}">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat Konsumen</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $penjualan->konsumen->alamat }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="kecamatan" class="form-label">Kecamatan konsumen</label>
                    <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="{{ $penjualan->konsumen->kecamatan }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="kecamatan" class="form-label">Gudang</label>
                    <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="{{ $penjualan->gudang->nama_gudang }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="no_ktp" class="form-label">Sepeda Motor Terjual</label>
                    <input type="text" class="form-control" id="no_ktp" name="no_ktp" value="{{ $penjualan->barang->nama_barang }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="no_telp" class="form-label">Nomor Rangka</label>
                    <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{ $penjualan->barang->nomor_rangka }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="karyawan" class="form-label">Karyawan yang Melayani</label>
                    <input type="text" class="form-control" id="karyawan" name="karyawan" value="{{ $penjualan->karyawan->nama_karyawan }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">harga Terjual</label>
                    <input type="text" class="form-control" id="harga" name="harga" value="Rp. {{ $penjualan->harga_terjual }}" readonly>
                </div>
            </section>
        </div>
    </div>
    @include('template/footer')
</body>
</html>