<!DOCTYPE html>
<html>
<head>
    <title>Surat Jalan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        .body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            font-weight: normal;
        }
        .left-align{ 
            text-align: left;
        }
        .center-align{
            text-align: center;
        }

        .right-align{
            text-align: right;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .th {
            background-color: #f2f2f2;
        }
    </style>
    @php use Carbon\Carbon; @endphp
</head>
<body>
    <p>PT. Marga Kartika Motor</p>
    <p>Dealer Resmi Motor Honda</p>
    <p>Blitar</p>

    <div class="right-align">
        <p>Kepada Yth : {{ $dataPengiriman->fj->konsumen->nama }}</p>
        <p>{{ $dataPengiriman->fj->konsumen->alamat }} </h5>
        <p>{{ $dataPengiriman->fj->konsumen->kode_wilayah->nama_wilayah }} </p>
    </div>
    <div class="center-align"> 
        <p>Surat Jalan : {{ $dataPengiriman->surat_jalan }} </p>
    </div>
    <br>
    <p>Dengan hormat, bersama ini dikiriman 1 (satu) unit sepeda motor tersebut dibawah ini:</p>
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
            <td>{{ $dataPengiriman->fj->barang->kode_barang }}</td>
            <td>{{ $dataPengiriman->fj->barang->nama_barang }}</td>
            <td>{{ $dataPengiriman->fj->barang->warna }}</td>
            <td>{{ $dataPengiriman->fj->barang->tahun_rakit }}</td>
            <td>{{ $dataPengiriman->fj->barang->nomor_rangka }}</td>
            <td>{{ $dataPengiriman->fj->barang->nomor_mesin }}</td>
        </tr>
    </table>
    <p> Perlengkapan : </p>
    <p> {{ $dataPengiriman->perlengkapan }}</p>
    <div class = "right-align"> 
        Wlingi, {{ Carbon::parse($dataPengiriman->created_at)->formatLocalized('%e %B %Y') }}
    </div>
    <table>
        <tr>
            <td width="250px"> 
                <p> Penerima, <br>

                <br>
                <br>
                <br>
                <br>
                <br>
                <p> {{ $dataPengiriman->fj->konsumen->nama }}</p>
            </td>

            <td width="250px"> 
                <p> Pengirim, </p>
                <br>
                <br>
                <br>
                <br>
                <br>
                <p> {{ $dataPengiriman->pengirim->nama_karyawan }}</p>
            </td>
            
            <td width="250px">
                <p> Mengetahui, </p>
                <br>
                <br>
                <br>
                <br>
                <br>
                <p> Tanda Tangan & <br>
                    Cap Perusahaan </p>
            </td>
        </tr>
    </table>
</div>
</body>
</html>
