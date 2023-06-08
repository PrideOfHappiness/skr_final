<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Dashboard Pemilik</title>
</head>
<body>
@include('template/navbar')
@include('template/sidebarPemilik')
<div class="container"> 
    <div class="mt-4">
        <div class="card"> 
            <div class="card-header"> 
                <h3 class="card-title"> 
                    <p> Diagram Persentase Sepeda Motor Terjual </p>
                </h3>
            </div>
            <div class="card-body"> 
                <canvas id="SPMTerjual"> </canvas>
            </div>
        </div>
        <div class="card"> 
            <div class="card-header"> 
                <h3 class="card-title"> 
                    <p> Diagram Frekuensi Pengiriman </p>
                </h3>
            </div>
            <div class="card-body"> 
                <canvas id="Pengiriman"> </canvas>
            </div>
        </div>
    </div>
</div>
@include('template/footer')
<script> 
    const data = {
        labels: {!! json_encode($labelPenjualan) !!},
            datasets: [{
                label: 'Data terdeteksi',
                data: {!! json_encode($dataPenjualan) !!},
                backgroundColor: [
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(255, 206, 86, 0.5)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)'
                ],
                borderWidth: 1,
                hoverOffset: 4
            }]
    };

    const config = {
        type: 'pie',
        data,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context){
                            var label = context.label || '';
                            if(label){
                                label += ': ';
                            }
                            label += Math.round(context.parsed * 100) + '%';
                            return label;
                        }
                    }
                }
            }
        }
    };

    const myChart = new Chart(
        document.getElementById('SPMTerjual'),
        config
    );
</script>

<script> 
    var chartData = {!! json_encode($chartDataPengiriman) !!};

    var labels = [];
    var datasets = [];

    for(var tahun in chartData){
        labels.push(tahun);
        var bulanData = chartData[tahun];
        var dataset = {
            label: tahun,
            data: [],
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        };

        for(var bulan in bulanData){
            dataset.data.push(bulanData[bulan]);
        }

        datasets.push(dataset);
    }

    var ctx = document.getElementById('Pengiriman').getContext('2d');
    new Chart(ctx, {
        type: 'bar', 
        data: {
            labels: labels,
            datasets: datasets,
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginsAtZero: true
                }
            }
        }
    });
</script>
</body>
</html>