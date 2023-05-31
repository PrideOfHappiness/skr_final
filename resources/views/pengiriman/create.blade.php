<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Tambah Data Pengiriman</title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarKaryawan')

    <div class="container"> 
        <div class="mt-4"> 
            <section class="content"> 
                <form action={{ route('pengiriman.store') }} method="post" enctype="multipart/form-data"> 
                    @csrf
                    <div class="mb-3">
                        <label for="penjualan" class="form-label">Faktur Jual</label>
                        <select name="penjualan" id="penjualan">
                            <option value=""> Silahkan Pilih Penjualan terlebih dahulu! </option>
                            @foreach($penjualan as $kons)
                                <option value="{{ $kons->id }}"> {{ $kons->penjualan }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="karyawan_pengirim" class="form-label">Nama Karyawan Yang Mengirim</label>
                        <select name="karyawan_pengirim" id="karyawan_pengirim">
                            <option value=""> Silahkan Pilih Karyawan terlebih dahulu! </option>
                            @foreach($karyawan as $kry)
                                <option value="{{ $kry->id }}"> {{ $kry->karyawan }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Perlengkapan</label>
                        <textarea name="perlengkapan" class="form-control" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Unggah Data</button>
                </form>
            </section>
        </div>
    </div>
    @include('template/footer')
</body>
