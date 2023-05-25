<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Data Barang</title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarAdmin')

    <section class="content"> 
        <br>
        <div class = "pull-right mb-2" class = "wrapper">
            <a class="btn btn-primary" href="{{ route('barang.create') }}"> Tambah Data Barang</a>
            <a class="btn btn-info" href="/barang/imporData"> Impor Data Barang</a>
        </div>

        <table class="table">
            <thead>
            <tr>
                <th>No.</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody> 
                @php $i = 1 @endphp
                @foreach ($barang as $brg)
                    <tr> 
                        <td> {{ $i++ }}</td>
                        <td> {{ $brg->kode_barang }}</td>
                        <td> {{ $brg->nama_barang }}</td>
                        <td> {{ $brg->status}} </td>
                        <td> 
                            <a class="badge bg-info" href="{{ route('barang.show', $brg->kode_barang)}}">Detail</span></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $barang->links() !!}
    </section>
    @include('template/footer')
</body>
</html>
