<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Rekap Data Pengiriman</title>
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
                            <th>Surat Jalan</th>
                            <th>Nama Konsumen</th>
                            <th>Alamat Pengiriman</th>
                            <th>Sepeda Motor</th>
                            <th>Status</th>
                            <th>Waktu PDI</th>
                            <th>Waktu Pengiriman</th>
                            <th>Waktu Selesai Pengiriman</th>
                        </tr>
                    </thead>
                    <tbody>  
                        @php $i = 1; @endphp
                        @foreach ($data as $penjualan)
                        <tr>
                            <td>{{ $i++ }} </td>
                            <td>{{ $penjualan->surat_jalan }}
                            <td>{{ $penjualan->fj->konsumen->nama }} </td>
                            <td>{{ $penjualan->fj->konsumen->alamat }} </td>
                            <td>{{ $penjualan->fj->barang->nama_barang }} </td>
                            <td>{{ $penjualan->status }}</td>
                            <td>{{ $penjualan->pdi_datetime }} </td>
                            <td>{{ $penjualan->shipping_datetime }} </td>
                            <td>{{ $penjualan->selesai_datetime }} </td>
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