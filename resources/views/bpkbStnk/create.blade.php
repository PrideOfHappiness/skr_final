<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Tambah Data BPKB dan STNK Sementara</title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarKaryawan')

    <div class="container">
        <div class="mt-4"> 
            <section class="content"> 
                <form action={{ route('bpkbstnk.store')}} method="post" enctype="multipart/form-data"> 
                    @csrf
                    <div class="mb-3">
                        <label for="penjualan" class="form-label">Data Penjualan</label>
                        <select name="penjualan" id="penjualan">
                            <option value=""> Silahkan Pilih Data Penjualan terlebih dahulu! </option>
                            @foreach($penjualan as $kons)
                                <option value="{{ $kons->id }}"> {{ $kons->penjualan }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nopol_sementara" class="form-label">Nomor Polisi Sementara</label>
                        <input type="text" class="form-control" id="nopol_sementara" name="nopol_sementara" placeholder="Nomor Polisi Sementara Sesuai STCK" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </section>
        </div>
    </div>
    @include('template/footer')
</body>
</html>