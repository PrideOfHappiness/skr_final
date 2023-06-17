<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Data Wilayah Operasional</title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarAdmin')

    <div class="container"> 
        <div class="mt-4"> 
            <section class="content"> 
                <br>
                <div class = "pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('wilayah.create') }}"> Tambah Wilayah</a>
                </div>
        
                <table class="table">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode Wilayah</th>
                        <th>Wilayah</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody> 
                        @php $i = 1 @endphp
                        @foreach ($wilayah as $wilayah)
                        <tr>
                            <td>{{ $i++ }} </td>
                            <td>{{ $wilayah->kode_wilayah }} </td>
                            <td>{{ $wilayah->nama_wilayah }} </td>
                            <td> 
                                <a class="badge bg-info" href="{{ route('wilayah.show', $wilayah->id)}}">Detail Wilayah</span></a>
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