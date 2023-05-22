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
        <form action={{ route('wilayah.store') }} method="post"> 
            @csrf
            <div class="mb-3">
                <label for="nama_wilayah" class="form-label">Nama Wilayah</label>
                <input type="text" class="form-control" id="nama_wilayah" name="nama_wilayah" placeholder="Nama Wilayah" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </section>
    @include('template/footer')
</body>