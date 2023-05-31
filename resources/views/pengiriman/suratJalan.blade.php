<!DOCTYPE html>
<html>
<head>
    <title>Surat Jalan</title>
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
    <h3>Blitar</h3>

    <div class="right-align">
        <h5>Kepada Yth : {{ $dataPengiriman->no_fj->konsumen->nama }}</h5>
        <h5>{{ $dataPengiriman->no_fj->konsumen->alamat }} </h5>
        <h5>{{ $dataPengiriman->no_fj->konsumen->kode_wilayah->nama_wilayah }} </h5>
    </div>
    <div class="center-align"> 
        <h6>Surat Jalan : {{ $dataPengiriman->surat_jalan }} </h6>
    </div>
    <br>
    <h6>Dengan hormat, bersama ini dikiriman 1 (satu) unit sepeda motor tersebut dibawah ini:</h6>
    <table>
        <tr>
            @php $i = 1; @endphp
            <th>No.</th>
            <th>Tipe</th>
            <th>Nama Sepeda Motor</th>
            <th>Warna</th>
            <th>Tahun</th>
            <th>No. Rangka</th>
            <th>No. Mesin</th>
        </tr>
        <tr>
            <td>{{ $i++}}</td>
            <td>{{ $dataPengiriman->no_fj->barang->nomor_rangka }}</td>
            <td>{{ $dataPengiriman->no_fj->barang->kode_barang }}</td>
            <td>{{ $dataPengiriman->no_fj->barang->nama_barang }}</td>
            <td>{{ $dataPengiriman->no_fj->barang->warna }}</td>
            <td>{{ $dataPengiriman->no_fj->barang->tahun_rakit }}</td>
            <td>{{ $dataPengiriman->no_fj->barang->no_rangka }}</td>
            <td>{{ $dataPengiriman->no_fj->barang->no_mesin }}</td>
        </tr>
    </table>
    <h6> Perlengkapan : </h6>
    <h6> {{ $dataPengiriman->perlengkapan }}</h6>
    <div class = "right-align"> 
        Blitar, {{ date('j-F-Y', $dataPengiriman->created_at) }}
    </div>
    <div class="container">
        <div class="row">
            <div class="col text-left" > 
                <h6> Penerima, <br>
                Nama Jelas & T. Tangan/Cap</h6>
            </div>

            <div class="col text-center"> 
                <h6> Pengirim, </h6>
            </div>

            <div class="col text-right">
                <h6> Mengetahui, <br>
                Tanda Tangan & Cap Perusahaan </h6>
            </div>
        </div>
    </div>
</div>
        
</body>
</html>
