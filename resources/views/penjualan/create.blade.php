<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Tambah Data Penjualan</title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarKaryawan')

    <div class="container"> 
        <section class="content"> 
            <form action={{ route('penjualan.store') }} method="post" enctype="multipart/form-data"> 
                @csrf
                <h3> Data Konsumen </h3>
                <br>
                <div class="mb-3">
                    <label for="kode_konsumen" class="form-label">Nama Konsumen</label>
                    <select name="kode_konsumen" id="kode_konsumen">
                        <option value=""> Silahkan Pilih Konsumen terlebih dahulu! </option>
                        @foreach($konsumen as $kons)
                            <option value="{{ $kons->id }}"> {{ $kons->nama }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="kode_wilayah" class="form-label">Wilayah</label>
                    <select name="kode_wilayah" id="kode_wilayah">
                        <option value=""> Silahkan Pilih Wilayah terlebih dahulu! </option>
                        @foreach($wilayah as $wyl)
                            <option value="{{ $wyl->id }}"> {{ $wyl->nama_wilayah }} </option>
                        @endforeach
                    </select>
                </div>
                <h3> Data Sepeda Motor Terjual </h3>
                <br>
                <div class="mb-3">
                    <label for="kode_gudang" class="form-label">Gudang</label>
                    <select name="kode_gudang" id="kode_gudang">
                        <option value=""> Silahkan Pilih Gudang terlebih dahulu! </option>
                        @foreach($gudang as $gdg)
                            <option value="{{ $gdg->id }}"> {{ $gdg->nama_gudang }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nomor_rangka" class="form-label">Sepeda Motor</label>
                    <select name="nomor_rangka" id="nomor_rangka">
                        <option value=""> Silahkan Pilih Sepeda Motor terlebih dahulu! </option>
                        @foreach($barang as $brg)
                            <option value="{{ $brg->id }}"> {{ $brg->barang_dijual }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga Terjual</label>
                    <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga Terjual (Rpxx.xxx.xxx)" required>
                </div>
                <div class="mb-3">
                    <label for="jenis_bayar" class="form-label">Jenis Bayar</label>
                    <select name="jenis_bayar" id="jenis_bayar">
                        <option value=""> Silahkan Pilih Jenis Bayar terlebih dahulu! </option>
                        <option value="Tunai"> Tunai </option>
                        <option value="Tunai Kredit"> Kredit Dealer </option>
                        <option value="Kredit"> Kredit Leasing </option>
                    </select>
                </div>
                <h3> Data Karyawan Penjual dan Dealer </h3>
                <br>
                <div class="mb-3">
                    <label for="kode_karyawan" class="form-label">Karyawan Penjual</label>
                    <select name="kode_karyawan" id="kode_karyawan">
                        <option value=""> Silahkan Pilih Karyawan terlebih dahulu! </option>
                        @foreach($karyawan as $kry)
                            <option value="{{ $kry->id }}"> {{ $kry->karyawan }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="kode_dealer" class="form-label">Dealer</label>
                    <select name="kode_dealer" id="kode_dealer">
                        <option value=""> Silahkan Pilih Konsumen terlebih dahulu! </option>
                        <option value="MKM"> Marga Kartika Motor </option>
                    </select>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Unggah Data</button>
            </form>
        </section>
    </div>
    @include('template/footer')
</body>