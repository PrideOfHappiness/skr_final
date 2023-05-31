<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Data Wilayah {{ $wilayah->nama_wilayah }}</title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarAdmin')

    <div class="container"> 
        <div class="mt-4"> 
            <section class="content"> 
                <div class="mb-3">
                    <label for="kode_wilayah" class="form-label">Kode Wilayah</label>
                    <input type="text" class="form-control" id="kode_wilayah" name="kode_wilayah" value="{{ $wilayah->kode_wilayah }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="nama_wilayah" class="form-label">Nama Wilayah</label>
                    <input type="text" class="form-control" id="nama_wilayah" name="nama_wilayah" value="{{ $wilayah->nama_wilayah }}" readonly>
                </div>
            </section>
        </div>
    </div>
    @include('template/footer')
</body>