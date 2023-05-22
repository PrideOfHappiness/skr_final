<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Tambah Data Wilayah</title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarAdmin')

    <section class="content"> 
        <form action={{ route('barang.store') }} method="post"> 
            @csrf
            <div class="mb-3">
                <label for="no_rangka" class="form-label">Nomor Rangka</label>
                <input type="text" class="form-control" id="no_rangka" name="no_rangka" placeholder="Nomor Mesin (Contoh: MHxxx / JMxxx)" required>
            </div>
            <div class="mb-3">
                <label for="no_mesin" class="form-label">Nomor Mesin</label>
                <input type="text" class="form-control" id="no_mesin" name="no_mesin" placeholder="Nomor Mesin (Contoh:JM5xxx)" required>
            </div>
            <div class="mb-3">
                <label for="kode_barang" class="form-label">Kode Barang</label>
                <input type="text" class="form-control" id="kode_barang" name="kode_barang" placeholder="Kode Barang (Contoh: H1B02Nxxx A/T)" required>
            </div>
            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang (Contoh: BEAT SPORTY CBS)" required>
            </div>
            <div class="mb-3">
                <label for="jenis" class="form-label">Jenis Sepeda Motor</label>
                <select name="jenis" id="jenis" class="form-control select2-multiple">
                    <option value="">Silahkan pilih jenis sepeda motor terlebih dahulu!</option>
                        <option value="Cub"> Cub </option>
                        <option value="Matic"> Matic </option>
                        <option value="Sport"> Sport </option>
                        <option value="Adventure"> Adventure </option>
                </select>
            </div>
            <div class="mb-3">
                <label for="warna" class="form-label">Warna</label>
                <input type="text" class="form-control" id="warna" name="warna" placeholder="Warna Sepeda Motor(Contoh: Black )" required>
            </div>
            <div class="mb-3">
                <label for="tahun_rakit" class="form-label">Tahun Rakit</label>
                <input type="text" class="form-control" id="tahun_rakit" name="tahun_rakit" placeholder="Tahun Rakit (Contoh: 2022)" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </section>
    @include('template/footer')
</body>
</html>
