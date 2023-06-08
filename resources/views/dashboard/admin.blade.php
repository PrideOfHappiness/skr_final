<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Dashboard Admin</title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarAdmin')  
        <div class="container"> 
            <div class="mt-4">
                <div class="row"> 
                    <div class="col-md-4">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $karyawanAll}}</h3>
                                <p>Karyawan Terdeteksi</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-person"></i>
                            </div>
                            <a href="/admin/karyawan" class="small-box-footer">Info Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $barangTersedia}}</h3>
                                <p>Stok SPM Terdeteksi</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-motorcycle"></i>
                            </div>
                            <a href="/admin/barang" class="small-box-footer">Info Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $barangTerjual}}</h3>
                                <p>SPM Terjual</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </div>
                            <a href="/admin/barang" class="small-box-footer">Info Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @include('template/footer')
</body>
</html>