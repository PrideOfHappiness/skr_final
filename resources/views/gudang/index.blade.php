<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Data Gudang</title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarAdmin')

    <div class="container"> 
        <div class="mt-4">
            <section class="content"> 
                <br>
                <div class = "pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('gudang.create') }}"> Tambah Data Gudang</a>
                </div>
        
                <table class="table">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode Gudang</th>
                        <th>Alamat</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody> 
                        @php $i=1 @endphp
                        @foreach ($gudang as $gd)
                        <tr>
                            <td>{{ $i++ }} </td>
                            <td>{{ $gd->kode_gudang }} </td>
                            <td>{{ $gd->alamat_gudang }}</td>
                            <td>
                                <a class="badge bg-info" href="{{ route('gudang.show', $gd->kode_gudang) }}">Detail Gudang</span></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
        </div>
    </div>
    @include('template/footer')
</body>
</html>