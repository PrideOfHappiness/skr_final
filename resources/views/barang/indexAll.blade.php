<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Data Barang</title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarAdmin')

    <div class="container"> 
        <div class="mt-4"> 
            <section class="content">
        
                <table class="table">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>No. Rangka</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Warna</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody> 
                        @php $i = 1 @endphp
                        @foreach ($barang as $brg)
                            <tr> 
                                <td> {{ $i++ }}</td>
                                <td> {{ $brg->nomor_rangka }}</td>
                                <td> {{ $brg->kode_barang }}</td>
                                <td> {{ $brg->nama_barang }}</td>
                                <td> {{ $brg->warna }}</td>
                                <td> {{ $brg->status}} </td>
                                <td> 
                                    <a class="badge bg-info" href="{{ route('barang.show', $brg->id)}}">Detail</span></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $barang->links() !!}
            </section>
        </div>
    </div>
    @include('template/footer')
</body>
</html>
