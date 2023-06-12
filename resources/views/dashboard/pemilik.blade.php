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
        <div class="row"> 
            <div class="col-md-4">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $growthPenjualanYoY . ' %'}}</h3>
                        <p>Pertumbuhan Penjualan Year on Year (YoY)</p>
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-chart-simple"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $growthPenjualanMoM . ' %'}}</h3>
                        <p>Pertumbuhan Penjualan Month on Month (MoM)</p>
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-chart-simple"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $growthPenjualanMovM . ' %'}}</h3>
                        <p>Pertumbuhan Penjualan Month to Month (MtM)</p>
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-chart-simple"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card"> 
                <div class="card-header"> 
                    <h3 class="card-title"> 
                        <p> Diagram Persentase Sepeda Motor Terjual </p>
                    </h3>
                </div>
                <div class="card-body"> 
                    <canvas id="SPMTerjual"></canvas>
                </div>
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
</body>
</html>