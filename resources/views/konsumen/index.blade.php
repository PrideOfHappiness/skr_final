<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Data Konsumen</title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarKaryawan')

    <div class="container"> 
        <div class="mt-4"> 
            <section class="content"> 
                <br>
                <div class = "pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('konsumen.create') }}"> Tambah Konsumen</a>
                </div>
        
                <table class="table">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode Konsumen</th>
                        <th>Konsumen</th>
                        <th>Kecamatan</th>
                        <th>Kab/Kota</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody> 
                        @php $i = 1; @endphp
                        @foreach ($konsumen as $kons)
                        <tr>
                            <td>{{ $i++ }} </td>
                            <td>{{ $kons->kode_konsumen }}
                            <td>{{ $kons->nama }} </td>
                            <td>{{ $kons->kecamatan }} </td>
                            <td>{{ $kons->kode_wilayah->nama_wilayah }}</td>
                            <td> 
                                <form action = "{{ route('konsumen.destroy', $kons->id) }}" method="Post">
                                    <a class="badge bg-info" href="{{ route('konsumen.show', $kons->id)}}">Detail Konsumen</span></a>
                                    <a class="badge bg-warning" href="{{ route('konsumen.edit', $kons->id)}}">Edit Data Konsumen</span></a>
                                    @csrf
                                        @method("DELETE")
                                        <button type="submit" class="badge bg-danger"> Hapus Data Konsumen</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $konsumen->links() !!}
            </section>
        </div>
    </div>
    @include('template/footer')
</body>
