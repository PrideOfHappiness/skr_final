<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>pertumbuhan Penjualan</title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarPemilik')

    <div class="mt-4"> 
        <section class="content"> 
            <div class="container-fluid"> 
                <div class="card card-default"> 
                    <div class="card-header"> 
                        <h3 class="card-title"> Pertumbuhan Penjualan YoY </h3> 
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body"> 
                    <p> Pertumbuhan Penjualan : {{ $growthPenjualanYoY }} . '%' </p>
                </div>
            </div>
            <div class="card card-default"> 
                <div class="card-header"> 
                    <h3 class="card-title"> Pertumbuhan Penjualan MoM </h3> 
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body"> 
                <p> Pertumbuhan Penjualan : {{ $growthPenjualanMoM }} . '%' </p>
            </div>
        </div>
        </section>
    </div>