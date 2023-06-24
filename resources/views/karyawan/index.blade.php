<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Data Karyawan</title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarAdmin')

    <div class="container"> 
        <div class="mt-4">
            <section class="content"> 
                <br>
                <div class = "pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('karyawan.create') }}"> Tambah Karyawan</a>
                </div>
                
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <table class="table">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode Karyawan</th>
                        <th>Nama Karyawan</th>
                        <th>Jabatan</th>
                        <th>Tanggal Bergabung</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody> 
                        @php $i=1 @endphp
                        @foreach ($dataKaryawan as $karyawan)
                        <tr>
                            <td>{{ $i++ }} </td>
                            <td>{{ $karyawan->kode_karyawan }} </td>
                            <td>{{ $karyawan->nama_karyawan }} </td>
                            <td>{{ $karyawan->status }}
                            <td>{{ $karyawan->created_at }}
                            <td> 
                                <form action = "{{ route('karyawan.destroy', $karyawan->id) }}" method="Post">
                                    <a class="badge bg-info" href="{{ route('karyawan.show', $karyawan->id)}}">Detail Karyawan</span></a>
                                    <a class="badge bg-warning" href="{{ route('karyawan.edit', $karyawan->id)}}">Edit Data</span></a>
                                    @csrf
                                        @method("DELETE")
                                        <button type="submit" class="badge bg-danger"> Hapus Data Karyawan Ini</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $dataKaryawan->links() !!}
            </section>
        </div>
    </div>
    @include('template/footer')
</body>