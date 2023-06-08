<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Dashboard Karyawan Pengirim</title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarKaryawanPengirim')
    <div class="container"> 
        <div class="mt-4"> 
            <div class="row"> 
                <div class="col-md-3">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $pengirimanBerlangsung}}</h3>
                            <p>Pengiriman sedang berlangsung</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-truck"></i>
                        </div>
                        <a href="/karyawanPengirim/pengiriman" class="small-box-footer">Info Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $pengirimanSelesai}}</h3>
                            <p>Pengiriman sudah selesai</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-check"></i>
                        </div>
                        <a href="/karyawanPengirim/pengiriman" class="small-box-footer">Info Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('template/footer')
</body>
</html>