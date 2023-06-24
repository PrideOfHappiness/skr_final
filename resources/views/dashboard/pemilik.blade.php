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
    var ctx = document.getElementById('SPMTerjual').getContext('2d');

    var chartData = <?php echo $chartDataJson; ?>;
    var label = <?php echo $labelJson; ?>;
    var persen = <?php echo $persentasesJson; ?>;

    console.log(label);
    var pieChart = new Chart(ctx, {
        type: 'bar', 
        data: {
            labels: label,
            datasets: [{
                label: 'Persentase Data (%)',
                data: persen,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.8)',
                    'rgba(54, 162, 235, 0.8)',
                    'rgba(255, 206, 86, 0.8)',
                    'rgba(255, 106, 46, 0.8)'
                ],
            }],
        },
        options: {
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context){
                            var label= context.label || '';
                            var persentase = '%';
                            return label + ' : ' + persentase;
                        }
                    }
                }
            }
        }
    });
</script>
</body>
</html>