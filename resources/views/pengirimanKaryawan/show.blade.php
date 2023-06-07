<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Lihat Data Penjualan {{ $pengirimanKaryawan->surat_jalan}} </title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarKaryawanPengirim')

    <div class="container"> 
        <div class="mt-4"> 
            <section class="content"> 
                <div class="mb-3">
                    <label for="nama_konsumen" class="form-label">Surat Jalan</label>
                    <input type="text" class="form-control" id="nama_konsumen" name="nama_konsumen" value="{{ $pengirimanKaryawan->surat_jalan }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="wilayah_asal" class="form-label">Konsumen</label>
                    <input type="text" class="form-control" id="wilayah_asal" name="wilayah_asal" value="{{ $pengirimanKaryawan->fj->konsumen->nama }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat Konsumen</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $pengirimanKaryawan->fj->konsumen->alamat }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="kecamatan" class="form-label">Sepeda Motor Yang Dikirim</label>
                    <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="{{ $pengirimanKaryawan->fj->barang->nama_barang }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="no_ktp" class="form-label">Karyawan Yang Mengirim</label>
                    <input type="text" class="form-control" id="no_ktp" name="no_ktp" value="{{ $pengirimanKaryawan->pengirim->nama_karyawan }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="no_telp" class="form-label">Perlengkapan</label>
                    <textarea name="perlengkapan" class="form-control" rows="4" readonly>{{ $pengirimanKaryawan->perlengkapan }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status Pengiriman</label>
                    <input type="text" class="form-control" id="status" name="status" value="{{ $pengirimanKaryawan->status }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Waktu PDI dan Persiapan Sepeda Motor</label>
                    <input type="text" class="form-control" id="harga" name="harga" value="{{ date('j F Y G:i:s', strtotime($pengirimanKaryawan->pdi_datetime)) }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Waktu Pengiriman</label>
                    <input type="text" class="form-control" id="harga" name="harga" value="{{ date('j F Y G:i:s', strtotime($pengirimanKaryawan->shipping_datetime)) }}" readonly>
                </div>
                <form action="/karyawanPengirim/pengiriman/{{$pengirimanKaryawan->id}}/ubahKeSelesai" method="post"> 
                    @csrf
                    <button type="submit" class="btn btn-success"> Tandai Sebagai Selesai </button>
                </form>
            </section>
        </div>
    </div>
    @include('template/footer')
</body>
</html>