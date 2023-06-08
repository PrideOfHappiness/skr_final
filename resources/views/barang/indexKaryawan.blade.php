<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Data Barang</title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarKaryawan')

    <div class="container"> 
        <div class="mt-4"> 
            <section class="content"> 
                <div class = "pull-right mb-2" class="wrapper"> 
                    <label> Filter data berdasarkan: </label>
                    <form action="{{ route('filterKry')}}" method="post"> 
                        @csrf
                        <label for="kategori">Jenis SPM: </label>
                        <select name="kategori" id="kategori" lass="js-example-basic-single form-control"> 
                            <option value=""> Silahkan pilih kategori SPM dahulu! </option>
                            <option value="MATIC"> Matic / Scooter </option>
                            <option value="CUB"> Bebek / Cub </option>
                            <option value="SPORT"> Sport </option>
                            <option value="ADVENTURE"> Adventure </option>
                        </select>
                        <label for="dataAwal"> Tanggal Awal: </label> 
                            <input type="date" name="dataAwal" id="dataAwal" class="width: 100px;">
                        <label for="dataAkhir"> Tanggal Akhir: </label> 
                            <input type="date" name="dataAkhir" id="dataAkhir" class="width: 100px;">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </form>
                </div>

                <table class="table">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nomor Rangka
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
                                <td> {{ $brg->nomor_rangka }}</td>
                                <td> {{ $brg->kode_barang }}</td>
                                <td> {{ $brg->nama_barang }}</td>
                                <td> {{ $brg->status}} </td>
                                <td> 
                                    <a class="badge bg-info" href="/karyawan/barangTersedia/{{$brg->id}}">Detail</span></a>
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
