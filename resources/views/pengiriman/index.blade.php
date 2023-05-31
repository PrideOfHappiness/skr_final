<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Data Penjualan</title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarKaryawan')

    <div class="container"> 
        <div class="mt-4"> 
            <section class= "content"> 
                <div class= "container-fluid"> 
                    <br>
                <div class = "pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('pengiriman.create') }}"> Buat Pengiriman Baru</a>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nomor Surat Jalan</th>
                            <th>Nama Penerima</th>
                            <th>Sepeda Motor</th>
                            <th>Nama Pengirim</th>
                            <th>Status Pengiriman</th>
                            <th>Waktu Buat Surat Jalan</th>
                            <th>Last Updated</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>  
                        @php $i = 1; @endphp
                        @foreach ($pengiriman as $penjualan)
                        <tr>
                            <td>{{ $i++ }} </td>
                            <td>{{ $penjualan->surat_jalan }}
                            <td>{{ $penjualan->no_fj->konsumen->nama }} </td>
                            <td>{{ $penjualan->no_fj->barang->nama_barang }} </td>
                            <td>{{ $penjualan->karyawan_pengirim->nama_karyawan }}</td>
                            <td>{{ $penjualan->status }} </td>
                            <td>{{ $penjualan->created_at }}</td>
                            <td>{{ $penjualan->history_updated_at}}</td>
                            <td> 
                                <a class="badge bg-info" href="{{ route('penjualan.show', $penjualan->id)}}">Detail Pengiriman</span></a>
                                <a class="badge bg-warning" href="/penjualan/{{ $penjualan->id}}/downloadSJ">Download Surat Jalan</span></a>
                                <a class="badge bg-warning" href="/penjualan/{{ $penjualan->id}}/ubahStatusPengiriman">Ubah Status Menjadi Pengiriman</span></a>
                            </td>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </section>
        </div>
    </div>
    @include('template/footer')
</body>