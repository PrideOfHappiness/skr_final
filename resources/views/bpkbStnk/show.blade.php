<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Lihat Data Wilayah</title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarKaryawan')
    
    <div class="container">
        <div class="mt-4"> 
            <section class="content"> 
                <h4>Data BPKB dan STNK</h4>
                <div class="mb-3">
                    <label for="no_plat" class="form-label">Nomor Polisi</label>
                    <input type="text" class="form-control" id="no_plat" name="no_plat" value="{{ $bpkb_stnk->no_plat }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="nama_bpkb_stnk" class="form-label">Nama Yang Tertera</label>
                    <input type="text" class="form-control" id="nama_bpkb_stnk" name="nama_bpkb_stnk" value="{{ $bpkb_stnk->penjualan->konsumen->nama }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="nama_bpkb_stnk" class="form-label">Alamat Yang Tertera</label>
                    <input type="text" class="form-control" id="nama_bpkb_stnk" name="nama_bpkb_stnk" value="{{ $bpkb_stnk->penjualan->konsumen->alamat }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="kab_kota" class="form-label">Kab/Kota</label>
                    <input type="text" class="form-control" id="kab_kota" name="kab_kota" value="{{ $bpkb_stnk->penjualan->wilayah->nama_wilayah }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="no_rangka" class="form-label">Nomor Rangka</label>
                    <input type="text" class="form-control" id="no_rangka" name="no_rangka" value="{{ $bpkb_stnk->penjualan->barang->nomor_rangka }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="no_mesin" class="form-label">Nomor Mesin</label>
                    <input type="text" class="form-control" id="nama_bpkb_stnk" name="nama_bpkb_stnk" value="{{ $bpkb_stnk->penjualan->barang->nomor_mesin }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="nama_sepeda_motor" class="form-label">Nama Sepeda Motor</label>
                    <input type="text" class="form-control" id="nama_sepeda_motor" name="nama_sepeda_motor" value="{{ $bpkb_stnk->penjualan->barang->nama_barang }}" readonly>
                </div>
                <h4> Data Orang Yang Mengambil STNK </h4>
                <div class="mb-3">
                    <label for="nama_ambil_stnk" class="form-label">Nama Pengambil STNK</label>
                    <input type="text" class="form-control" id="nama_ambil_stnk" name="nama_ambil_stnk" value="{{ $bpkb_stnk->nama_pengambil_stnk }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="alamat_ambil_stnk" class="form-label">Alamat Pengambil STNK</label>
                    <input type="text" class="form-control" id="nama_gudang" name="nama_gudang" value="{{ $bpkb_stnk->alamat_pengambil_stnk }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="ktp_ambil_stnk" class="form-label">Nomor KTP Pengambil STNK</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $bpkb_stnk->ktp_pengambil_stnk }}" readonly>
                </div>
                <h4>Status BPKB dan STNK </h4>
                <div class="mb-3">
                    <label for="alamat_ambil_stnk" class="form-label">Status Nopol dan STNK</label>
                    <input type="text" class="form-control" id="nama_gudang" name="nama_gudang" value="{{ $bpkb_stnk->status_stnk_plat }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="ktp_ambil_stnk" class="form-label">Status BPKB</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $bpkb_stnk->status_bpkb }}" readonly>
                </div>
            </section>
            @include('template/footer')
        </div>
    </div>
</body>
</html>