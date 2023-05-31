<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Lihat Data Penjualan {{ $pengiriman->surat_jalan}} </title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarKaryawan')

    <div class="container"> 
        <div class="mt-4"> 
            <section class="content"> 
                <div class="mb-3">
                    <label for="nama_konsumen" class="form-label">Surat Jalan</label>
                    <input type="text" class="form-control" id="nama_konsumen" name="nama_konsumen" value="{{ $pengiriman->surat_jalan }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="wilayah_asal" class="form-label">Konsumen</label>
                    <input type="text" class="form-control" id="wilayah_asal" name="wilayah_asal" value="{{ $pengiriman->no_fj->konsumen->nama }}">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat Konsumen</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $pengiriman->no_fj->konsumen->alamat }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="kecamatan" class="form-label">Sepeda Motor Yang Dikirim</label>
                    <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="{{ $pengiriman->no_fj->barang->nama_barang }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="no_ktp" class="form-label">Karyawan Yang Mengirim</label>
                    <input type="text" class="form-control" id="no_ktp" name="no_ktp" value="{{ $pengiriman->karyawan_pengirim->nama_karyawan }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="no_telp" class="form-label">Perlengkapan</label>
                    <textarea name="perlengkapan" class="form-control" rows="4" readonly value="{{ $pengiriman->perlengkapan }}"></textarea>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status Pengiriman</label>
                    <input type="text" class="form-control" id="status" name="status" value="{{ $pengiriman->status }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Waktu PDI dan Persiapan Sepeda Motor</label>
                    <input type="text" class="form-control" id="harga" name="harga" value="{{ date('j-F-Y G-i-s', $pengiriman->pdi_datetime) }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Waktu Pengiriman</label>
                    <input type="text" class="form-control" id="harga" name="harga" value="{{ date('j-F-Y G-i-s', $pengiriman->shipping_datetime) }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Waktu Selesai</label>
                    <input type="text" class="form-control" id="harga" name="harga" value="{{ date('j-F-Y G-i-s', $pengiriman->selesai_datetime) }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="durasi_pdi_pengiriman" class="form-label">Durasi Antara PDI Sampai Pengiriman</label>
                    <input type="text" class="form-control" id="durasi_pdi_pengiriman" name="durasi_pdi_pengiriman" value="{{ $pengiriman->pdi_shipping }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="durasi_pdi_pengiriman" class="form-label">Durasi Antara Pengiriman Sampai Selesai</label>
                    <input type="text" class="form-control" id="durasi_pdi_pengiriman" name="durasi_pdi_pengiriman" value="{{ $pengiriman->shipping_selesai }}" readonly>
                </div>
            </section>
        </div>
    </div>
</body>
</html>