<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Rekap Data Penjualan</title>
</head>
<body>
@include('template/navbar')
@include('template/sidebarPemilik')
<div class="container">
    <div class="mt-4"> 
        <section class="content">
            <div class="container-fluid">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> Pemilihan Durasi untuk Data Sepeda Motor Terjual</h3>
                        </div>
                        <form action="{{ route('prosesSPM') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label> Silahkan Pilih Tanggal Awal yang Diinginkan</label>
                                    <div class="input-group date" id="dataAwal" data-target-input="nearest">
                                        <input type="date" class="form-control datepicker-input" name="dataAwal" data-target="#dataAwal"/>
                                        <div class="input-group-append" data-target="#dataAwal" data-toggle="datetimepicker">
                                            <div class="input-group-text">
                                                <i class="fa fa-calendar"> </i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label> Silahkan Pilih Tanggal Akhir yang Diinginkan</label>
                                    <div class="input-group date" id="dataAkhir" data-target-input="nearest">
                                        <input type="date" class="form-control datepicker-input" name="dataAkhir" data-target="#dataAkhir"/>
                                        <div class="input-group-append" data-target="#dataAkhir" data-toggle="datetimepicker">
                                            <div class="input-group-text">
                                                <i class="fa fa-calendar"> </i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary"> Ambil Data </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@include('template/footer')
</body>
</html>

