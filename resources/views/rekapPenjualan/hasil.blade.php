<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Rekap Data Penjualan</title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarPemilik')

    <div class="container"> 
        <div class="mt-4"> 
            <section class= "content"> 
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nomor Faktur Jual</th>
                            <th>Nama Konsumen</th>
                            <th>Sepeda Motor</th>
                            <th>Tanggal Buat Penjualan</th>
                        </tr>
                    </thead>
                    <tbody>  
                        @php $i = 1; @endphp
                        @foreach ($data as $penjualan)
                        <tr>
                            <td>{{ $i++ }} </td>
                            <td>{{ $penjualan->no_fj }}
                            <td>{{ $penjualan->konsumen->nama }} </td>
                            <td>{{ $penjualan->barang->nama_barang }} </td>
                            <th>{{ $penjualan->created_at }}
                        @endforeach
                    </tbody>
                </table>
                </div>
            </section>
        </div>
    </div>
    @include('template/footer')
</body>
</html>