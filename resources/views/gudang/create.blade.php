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
        <form action={{ route('gudang.store') }} method="post"> 
            @csrf
            <div class="mb-3">
                <label for="nama_gudang" class="form-label">Nama Gudang</label>
                <input type="text" class="form-control" id="nama_gudang" name="nama_gudang" placeholder="Nama Gudang" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat Gudang</label>
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Wilayah" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </section>
    @include('template/footer')
</body>
</html>