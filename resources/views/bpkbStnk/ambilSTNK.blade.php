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
        <p> SURAT PERNYATAAN PENGAMBILAN STNK </p>
    </div>

    <br>
    <p> Yang bertanda tangan di bawah ini: </p>
    <p> Nama       : {{ $datastnk->nama_pengambil_stnk }} </p>
    <p> No. KTP    : {{ $datastnk->ktp_pengambil_stnk }} </p>
    <p> Alamat     : {{ $datastnk->alamat_pengambil_stnk }} </p>
    <br>
    <p> Dengan ini menyatakan bahwa Saya telah menerima Surat Tanda Nomor Kendaraan (STNK) dan nomor polisi dengan data yang tertera di bawah ini: </p>
    <br>
    <table>
        <tr>
            <th>Nomor Polisi</th>
            <th>Nomor Faktur</th>
            <th>Nama</th>
            <th>Nomor Mesin</th>
            <th>Nomor Rangka</th>
        </tr>
        <tbody> 
            <tr> 
                <td> {{ $datastnk->no_plat }} </td>
                <td> {{ $datastnk->penjualan->no_fj }} </td>
                <td> {{ $datastnk->penjualan->konsumen->nama }}</td>
                <td> {{ $datastnk->penjualan->barang->nomor_mesin }} </td>
                <td> {{ $datastnk->penjualan->barang->nomor_rangka }} </td>
            </tr>
        </tbody>
    </table>
    <p>STNK dan nomor polisi tersebut sudah saya terima di PT. Marga Kartika Motor, Jl. Hayam Wuruk No. 58 Wlingi, Blitar,
       di hadapan {{ $datastnk->karyawancetakstnk->nama_karyawan }} dalam kondisi benar dan lengkap. </p>
    <div class = "right-align"> 
        Wlingi, {{ Carbon::parse($datastnk->tgl_ambil_stnk_plat)->formatLocalized('%e %B %Y') }}
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
                <p>( {{ $datastnk->nama_pengambil_stnk }} )</p>
            </td>

            <td class="col text-center"> 
                <p> Diserahkan oleh, </p>
                <br>
                <br>
                <br>
                <br>
                <br> 
                <p>( {{ $datastnk->karyawancetakstnk->nama_karyawan }} )</p>
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