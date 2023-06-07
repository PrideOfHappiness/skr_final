<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Data Penjualan</title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarKaryawanPengirim')

    <div class="container"> 
        <div class="mt-4"> 
            <section class="content"> 
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nomor Surat Jalan</th>
                            <th>Nama Penerima</th>
                            <th>Alamat</th>
                            <th>Sepeda Motor</th>
                            <th>Warna</th>
                            <th>Status Pengiriman</th>
                            <th>Last Updated</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody> 
                        @php $i = 1; @endphp
                        @foreach ($pengirimanKaryawan as $pengiriman)
                        <tr> 
                            <td> {{ $i++ }} </td>
                            <td> {{ $pengiriman->surat_jalan }} </td>
                            <td> {{ $pengiriman->fj->konsumen->nama }} </td>
                            <td> {{ $pengiriman->fj->konsumen->alamat }} </td>
                            <td> {{ $pengiriman->fj->barang->nama_barang }} </td>
                            <td> {{ $pengiriman->fj->barang->warna }}</td>
                            <td> {{ $pengiriman->status }} </td>
                            <td> {{ $pengiriman->updated_at }} </td>
                            <td> 
                                <a class="badge bg-info" href="/karyawanPengirim/{{ $pengiriman->id }}/showPengiriman">Detail Pengiriman</span></a>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </section>
            @include('template/footer')
        </div>
    </div>