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
                <br>
                <div class = "pull-right mb-2" class = "wrapper">
                    <a class="btn btn-primary" href="/barang/allData"> Lihat Seluruh Barang</a>
                    <a class="btn btn-primary" href="{{ route('barang.create') }}"> Tambah Data Barang</a>
                    <a class="btn btn-info" href="/barang/imporData"> Impor Data Barang</a>
                </div>
                <div class = "pull-right mb-2" class="wrapper"> 
                    <form action="{{ route('filter')}}" method="post"> 
                        @csrf
                        <select name="kategori" id="kategori" lass="js-example-basic-single form-control"> 
                            <option value=""> Silahkan pilih kategori sepeda motor terlebih dahulu! </option>
                            <option value="MATIC"> Matic / Scooter </option>
                            <option value="CUB"> Bebek / Cub </option>
                            <option value="SPORT"> Sport </option>
                            <option value="ADVENTURE"> Adventure </option>
                        </select>
                        <select name="status" id="status" lass="js-example-basic-single form-control"> 
                            <option value=""> Silahkan pilih status sepeda motor terlebih dahulu! </option>
                            <option value="TERSEDIA"> Tersedia di dalam gudang </option>
                            <option value="TERJUAL"> Terjual </option>
                        </select>
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </form>
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
                                <td> {{ $i++ }} </td>
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
        </div>
    </div>
    @include('template/footer')
</body>
</html>
