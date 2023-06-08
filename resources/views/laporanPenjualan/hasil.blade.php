<!DOCTYPE html>
<html lang="en"> 
    <head> 
        <title> Hasil Pencarian Data berdasarkan tanggal {{ $awal }} hingga {{ $akhir }} </title>
        @include('template/header')
    </head>
    <body> 
        @include('template/navbar')
        @include('template/sidebarPemilik')

        <div class="container">
            <div class="mt-4">
                <section class="content"> 
                    <div class="container-fluid"> 
                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title"> Hasil Pencarian Data Sepeda Motor Terjual Dari Tanggal {{ $awal }} sampai Tanggal {{ $akhir }} </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                                <div class="card-body"><canvas id="grafikSPM1"></canvas>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        @include('template/footer')
    </body>
</html>
<script>
    //--GrafikSPM1 (Keluar Hasil SQL)
    var chartDatas = JSON.parse('<?php echo $chart_data; ?>');
    const data = {
        labels: chartDatas.label,
        datasets: [{
            label: "Jumlah unit terdaftar",
            data: chartDatas.jumlah,
            backgroundColor: [
                'rgba(055, 99, 132, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
            ],
            borderWidth: 1
            }]
    };

    const configBar = {
        type: 'bar',
        data: data,
        options:
        {
            maintainAspectRatio : true,
            responsive : true,
            cutoutPercentage: 80,
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Nama Sepeda Motor'
                    }
                },
                y: {
                    beginAtZero: true,
                    title: {
                        display: true, 
                        text: 'Jumlah Data'
                    }
                }
            }
        }
    };

    const grafikSPM1 = new Chart(
        document.getElementById('grafikSPM1'),
        configBar
    );
</script>
