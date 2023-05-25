<!DOCTYPE html>
<html>
<head>
    <title>Faktur Jual</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        
        .center-align{
            text-align: center;
        }

        .right-align{
            text-align: right;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>PT. Marga Kartika Motor</h2>
    <h3>Dealer Resmi Motor Honda</h3>

    <div class="center-align"> 
        <h6>Tanda Terima Uang Sementara</h6>
        <h6>{{ $dataPenjualan->no_fj }}</h6>
    </div>
    <br>
    <h6>Telah terima dari : {{ $dataPenjualan->konsumen->nama}} </h6>
    <h6>Jumlah sebesar    : {{ $dataPenjualan->harga_terjual }} </h6>
    <h6>Titipan uang ke 1 untuk pembelian {{ $dataPenjualan->jenis_bayar }} sepeda motor baru di bawah ini:</h6>
    <table>
        <tr>
            @php $i = 1; @endphp
            <th>No.</th>
            <th>Nomor Rangka</th>
            <th>Nomor Mesin</th>
            <th>Tipe</th>
            <th>Nama Barang</th>

        </tr>
        <tr>
            <td>{{ $i++}}</td>
            <td>{{ $dataPenjualan->barang->nomor_rangka }}</td>
            <td>{{ $dataPenjualan->barang->nomor_mesin }}</td>
            <td>{{ $dataPenjualan->barang->kode_barang }}</td>
            <td>{{ $dataPenjualan->barang->nama_barang }}</td>
        </tr>
    </table>
    <h6> Harga tidak mengikat, harga yang berlaku adalah <br>
        harga pada waktu penyerahan barang.</h6>
    <h6> Apabila unit yang dipesan sudah ada dan dibatalkan<br>
        maka uang yang dititipkan hangus 50%. </h6>
    <div class = "right-align"> 
        Blitar, {{ $dataPenjualan->created_at }}
    </div>
    <div class="container">
        <div class="row">
            <div class="col text-left" > 
                <h6> Admin Otorisasi Penjualan</h6>
            </div>

            <div class="col text-center"> 
                <h6> {{ $dataPenjualan->karyawan->nama_karyawan }}</h6>
            </div>

            <div class="col text-right">
                <h6> {{ $dataPenjualan->konsumen->nama}} </h6>
            </div>
        </div>
    </div>
</div>
        
</body>
</html>
