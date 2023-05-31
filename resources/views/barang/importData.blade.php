<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Tambah Data Wilayah</title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarAdmin')

    <div class="container"> 
        <div class="mt-4"> </div>
        <section class="content"> 
            <form action={{ route('prosesImpor') }} method="post" enctype="multipart/form-data"> 
                @csrf
                <div class="mb-3">
                    <label for="file_excel" class="form-label">File Excel Data</label>
                    <input type="file" class="form-control" id="file_excel" name="file_excel" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </section>
    </div>
    @include('template/footer')
</body>
</html>