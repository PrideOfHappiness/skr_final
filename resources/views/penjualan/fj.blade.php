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
    @php use Carbon\Carbon; @endphp
</head>
<body>
    <p>PT. Marga Kartika Motor</p>
    <p>Dealer Resmi Motor Honda</p>

    <div class="center-align"> 
        <p>Tanda Terima Uang Sementara</p>
        <p>{{ $dataPenjualan->no_fj }}</p>
    </div>
    <br>
    <p>Telah terima dari : {{ $dataPenjualan->konsumen->nama}} </p>
    <p>Jumlah sebesar    : Rp. {{ $dataPenjualan->harga_terjual }},00 </p>
    <p>Titipan uang ke 1 untuk pembelian {{ $dataPenjualan->jenis_bayar }} sepeda motor baru di bawah ini:</p>
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
    <p> Harga tidak mengikat, harga yang berlaku adalah <br>
        harga pada waktu penyerahan barang.</p>
    <p> Apabila unit yang dipesan sudah ada dan dibatalkan<br>
        maka uang yang dititipkan hangus 50%. </p>
    <div class = "right-align"> 
        Blitar, {{ Carbon::parse($dataPenjualan->created_at)->formatLocalized('%e %B %Y') }}
    </div>
    <table>
        <tr>
            <td class="col text-left" > 
                <p> Admin Otorisasi Penjualan</p>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <p> Tanda tangan admin & cap perusahaan</p>
            </td>

            <td class="col text-center"> 
                <p> Karyawan, </p>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <p> {{ $dataPenjualan->karyawan->nama_karyawan }}</p>
            </td>

            <td class="col text-right">
                <p> Konsumen,  </p>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <p> {{ $dataPenjualan->konsumen->nama}} </p>
            </td>
        </tr>
    </table>
</div>
</body>
</html>
