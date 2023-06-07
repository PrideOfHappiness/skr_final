<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Administrasi Data BPKB, Nomor Polisi, dan STNK PT. Marga Kartika Motor</title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarKaryawan')

    <div class="container"> 
        <div class="mt-4"> 
            <section class="content"> 
                <div class="container-fluid"> 
                    <div class="pull-right mb-2"> 
                        <a class="btn btn-success" href="{{ route('bpkbstnk.create') }}">Buat Data BPKB dan STNK Baru</a>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nomor Polisi</th>
                            <th>Nama Penerima</th>
                            <th>Alamat Penerima</th>
                            <th>Nomor Rangka</th>
                            <th>Nomor Mesin</th>
                            <th>Nama Kendaraan</th>
                            <th>Status BPKB</th>
                            <th>Status STNK dan Nomor Polisi</th>
                            <th>Tanggal Ambil BPKB</th>
                            <th>Tanggal Ambil Nomor Polisi dan STNK</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>  
                        @php $i = 1; @endphp
                        @foreach($bpkb_stnk as $bpkb)
                        <tr> 
                            <td> {{ $i++ }} </td>
                            <td> {{ $bpkb->no_plat }} </td>
                            <td> {{ $bpkb->penjualan->konsumen->nama }} </td>
                            <td> {{ $bpkb->penjualan->konsumen->alamat }}</td>
                            <td> {{ $bpkb->penjualan->barang->nomor_rangka }}</td>
                            <td> {{ $bpkb->penjualan->barang->nomor_mesin }}</td>
                            <td> {{ $bpkb->penjualan->barang->nama_barang }}</td>
                            <td> {{ $bpkb->status_bpkb }}</td>
                            <td> {{ $bpkb->status_stnk_plat }}</td>
                            <td> {{ $bpkb->tgl_ambil_bpkb }}</td>
                            <td> {{ $bpkb->tgl_ambil_stnk_plat }}</td>
                            <td> 
                                <a class="badge bg-info" href="{{ route('bpkbstnk.show', $bpkb->id)}}">Detail Administrasi BPKB dan STNK</span></a>
                                <a class="badge bg-primary" href="{{ route('bpkbstnk.edit', $bpkb->id)}}">Ubah Data Administrasi BPKB dan STNK</span></a>
                                @if($bpkb->status_stnk_plat == 'Selesai')
                                    <form action="{{ route('downloadSPSTNK', $bpkb->id)}}" method="POST">
                                        @csrf
                                        <button type="submit" class="badge bg-primary">Download SP Pengambilan STNK</button>           
                                    </form>
                                @endif
                                @if($bpkb->status_bpkb == 'Selesai')
                                    <form action="{{ route('downloadSPBPKB', $bpkb->id)}}" method="POST">
                                        @csrf
                                        <button type="submit" class="badge bg-primary">Download SP Pengambilan BPKB</button>           
                                    </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
        </div>
        @include('template/footer')
    </div>
</body>
</html>