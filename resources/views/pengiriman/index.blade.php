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
                            <td>{{ $penjualan->fj->konsumen->nama }} </td>
                            <td>{{ $penjualan->fj->barang->nama_barang }} </td>
                            <td>{{ $penjualan->pengirim->nama_karyawan }}</td>
                            <td>{{ $penjualan->status }} </td>
                            <td>{{ $penjualan->created_at }}</td>
                            <td>{{ $penjualan->updated_at}}</td>
                            <td> 
                                <form action = "{{ route('pengiriman.destroy', $penjualan->id) }}" method="Post">
                                    <a class="badge bg-info" href="{{ route('pengiriman.show', $penjualan->id)}}">Detail Pengiriman</span></a>
                                    <a class="badge bg-warning" href="/pengiriman/{{ $penjualan->id}}/downloadSJ">Download Surat Jalan</span></a>
                                    <a class="badge bg-warning" href="/pengiriman/{{ $penjualan->id}}/ubahStatusPengiriman">Ubah Status Menjadi Pengiriman</span></a>
                                    @csrf
                                        @method("DELETE")
                                            <button type="submit" class="badge bg-danger"> Hapus Data Pengiriman Ini</button>
                                </form>
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