<!DOCTYPE html>
<html>
<head>
    <title>Surat Pernyataan Pengambilan BPKB</title>
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

    <div class="center-align"> 
        <p> SURAT PERNYATAAN PENGAMBILAN BPKB </p>
    </div>

    <br>
    <p> Yang bertanda tangan di bawah ini: </p>
    <p> Nama       : {{ $databpkb->penjualan->konsumen->nama }} </p>
    <p> No. KTP    : {{ $databpkb->penjualan->konsumen->no_ktp }} </p>
    <p> Alamat     : {{ $databpkb->penjualan->konsumen->alamat }} </p>
    <br>
    <p> Dengan ini menyatakan bahwa saya telah menerima sebuah Buku Pemilik Kendaraan Bermotor (BPKB) dengan 
        data yang tertera di bawah ini: </p>
    <br>
    <p> Nomor BPKB              : {{ $databpkb->nomor_bpkb }} </p>
    <p> Nama BPKB               : {{ $databpkb->penjualan->konsumen->nama }} </p>
    <p> Tipe Sepeda Motor       : {{ $databpkb->penjualan->barang->kode_barang }} </p>
    <p> Sepeda Motor Terdaftar  : {{ $databpkb->penjualan->barang->nama_barang }}</p>
    <br>
    <p>BPKB ini sudah saya terima di PT. Marga Kartika Motor, Jl. Hayam Wuruk No. 58 Wlingi, Blitar,
       di hadapan {{ $databpkb->karyawancetakbpkb->nama_karyawan }} dalam kondisi benar dan lengkap. </p>
       <div class = "right-align"> 
        Wlingi, {{ Carbon::parse($databpkb->tanggal_ambil_bpkb)->formatLocalized('%e %B %Y') }}
    </div>
    <table>
        <tr>
            <td class="col text-left" > 
                <p> Diterima oleh, </p>
                <br>
                <br>
                <br>
                <br>
                <br> 
                <p>( {{ $databpkb->penjualan->konsumen->nama }} )</p>
            </td>

            <td class="col text-center"> 
                <p> Diserahkan oleh, </p>
                <br>
                <br>
                <br>
                <br>
                <br> 
                <p>( {{ $databpkb->karyawancetakstnk->nama_karyawan }} )</p>
            </td>

            <td class="col text-right">
                <p> Mengetahui, </p>
                <br>
                <br>
                <br>
                <br>
                <br> 
                <p> Tanda tangan admin dan cap perusahaan </p>
            </td>
        </tr>
    </table>
        
</body>
    