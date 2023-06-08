<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Dashboard Karyawan</title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarKaryawan')
    <div class = "container"> 
        <div class="mt-4"> 
            <div class="row"> 
                <div class="col-md-3"> 
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $konsumen}}</h3>
                            <p>Konsumen Terdeteksi</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-person"></i>
                        </div>
                        <a href="/karyawan/penjualan" class="small-box-footer">Info Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-md-3"> 
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $penjualan}}</h3>
                            <p>Penjualan Terdeteksi</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </div>
                        <a href="/karyawan/penjualan" class="small-box-footer">Info Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-md-3"> 
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $pengirimanBerlangsung}}</h3>
                            <p>Pengiriman Sedang Berlangsung</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-truck-fast"></i>
                        </div>
                        <a href="/karyawan/pengiriman" class="small-box-footer">Info Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-md-3"> 
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $pengirimanSelesai}}</h3>
                            <p>Pengiriman Selesai</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-truck-fast"></i>
                        </div>
                        <a href="/karyawan/pengiriman" class="small-box-footer">Info Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('template/footer')
</body>
</html>