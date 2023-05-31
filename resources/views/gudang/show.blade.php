<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Tambah Data Wilayah</title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarAdmin')

    <div class="container"> 
        <div class="mt-4"> 
            <section class="content"> 
                <div class="mb-3">
                    <label for="nama_gudang" class="form-label">Kode Gudang</label>
                    <input type="text" class="form-control" id="nama_gudang" name="nama_gudang" value="{{ $gudang->kode_gudang }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="nama_gudang" class="form-label">Nama Gudang</label>
                    <input type="text" class="form-control" id="nama_gudang" name="nama_gudang" value="{{ $gudang->nama_gudang }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat Gudang</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $gudang->alamat_gudang }}" readonly>
                </div>
            </section>
        </div>
    </div>
    @include('template/footer')
</body>
</html>