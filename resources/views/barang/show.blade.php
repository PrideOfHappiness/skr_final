<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Data Barang {{$barang->nomor_rangka}}</title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarAdmin')

    <div class="container"> 
        <div class="mt-4"> 
            <section class="content"> 
                <div class="mb-3">
                    <label for="no_rangka" class="form-label">Nomor Rangka</label>
                    <input type="text" class="form-control" id="no_rangka" name="no_rangka" value="{{ $barang->nomor_rangka }}" required>
                </div>
                <div class="mb-3">
                    <label for="no_mesin" class="form-label">Nomor Mesin</label>
                    <input type="text" class="form-control" id="no_mesin" name="no_mesin" {{ $barang->nomor_mesin }} readonly>
                </div>
                <div class="mb-3">
                    <label for="kode_barang" class="form-label">Kode Barang</label>
                    <input type="text" class="form-control" id="kode_barang" name="kode_barang" {{ $barang->kode_barang }} readonly>
                </div>
                <div class="mb-3">
                    <label for="nama_barang" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" {{ $barang->nama_barang }} readonly>
                </div>
                <div class="mb-3">
                    <label for="nama_barang" class="form-label">Jenis</label>
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" {{ $barang->jenis }} readonly>
                </div>
                <div class="mb-3">
                    <label for="warna" class="form-label">Warna</label>
                    <input type="text" class="form-control" id="warna" name="warna" {{ $barang->warna }} readonly>
                </div>
                <div class="mb-3">
                    <label for="tahun_rakit" class="form-label">Tahun Rakit</label>
                    <input type="text" class="form-control" id="tahun_rakit" name="tahun_rakit" {{ $barang->tahun_rakit }} readonly>
                </div>
            </section>
        </div>
    </div>
    @include('template/footer')
</body>
</html>