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
                    <form action="{{ route('filter') }}" method="POST">
                        <input type="text" name="name" placeholder="Nama">
                        <button type="submit">Filter</button> 
                    </form>
                    <br>
                <div class = "pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('penjualan.create') }}"> Tambah Penjualan</a>
                </div>
        
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nomor Faktur Jual</th>
                            <th>Nama Konsumen</th>
                            <th>Sepeda Motor</th>
                            <th>Tanggal Buat Penjualan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>  
                        @php $i = 1; @endphp
                        @foreach ($dataPenjualan as $penjualan)
                        <tr>
                            <td>{{ $i++ }} </td>
                            <td>{{ $penjualan->no_fj }}
                            <td>{{ $penjualan->konsumen->nama }} </td>
                            <td>{{ $penjualan->barang->nama_barang }} </td>
                            <th>{{ $penjualan->created_at }}
                            <td> 
                                <a class="badge bg-info" href="{{ route('penjualan.show', $penjualan->id)}}">Detail Penjualan</span></a>
                                <a class="badge bg-warning" href="/penjualan/{{$penjualan->id}}/downloadFJ">Download FJ</span></a>
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