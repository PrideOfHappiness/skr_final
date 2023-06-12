<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Tambah Data Konsumen</title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarKaryawan')

    <div class="container"> 
        <div class="mt-4"> 
            <section class="content"> 
                <form action={{ route('konsumen.update', $konsumen->id) }} method="post" enctype="multipart/form-data"> 
                    @csrf
                    @method('PUT')
        
                    <input type="hidden" id="kode_konsumen" name="kode_konsumen" required value="{{ $konsumen->kode_konsumen }}">
                    <div class="mb-3">
                        <label for="nama_konsumen" class="form-label">Nama Konsumen</label>
                        <input type="text" class="form-control" id="nama_konsumen" name="nama_konsumen" value="{{ $konsumen->nama }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="wilayah_asal" class="form-label">Wilayah Asal</label>
                        <input type="text" class="form-control" id="wilayah_asal" name="wilayah_asal" value="{{ $konsumen->kode_wilayah->nama_wilayah }}">
                    </div>
                    <div class="mb-3">
                        <label for="nama_dosen" class="form-label">Wilayah</label>
                        <select name="kode_wilayah" id="kode_wilayah" class="form-control select2-multiple">
                            <option value="">Silahkan pilih wilayah terlebih dahulu!</option>
                            @foreach($wilayah as $wyl)
                                <option value="{{$wyl->id}}"> {{ $wyl->nama_wilayah }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $konsumen->alamat }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="kecamatan" class="form-label">Kecamatan</label>
                        <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="{{ $konsumen->kecamatan }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="no_ktp" class="form-label">Nomor KTP</label>
                        <input type="text" class="form-control" id="no_ktp" name="no_ktp" value="{{ $konsumen->no_ktp }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="no_telp" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{ $konsumen->no_telp }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="no_telp" class="form-label">Foto KTP Lama</label>
                        <img width="150px" src="{{ url('upload/foto_ktp/'.  $konsumen->namaFileKtp)}}">
                    <div class="mb-3">
                        <label for="namaFileKtp" class="form-label">Foto KTP Konsumen</label>
                        <input type="file" class="form-control" id="namaFileKtp" name="namaFileKtp" value="{{ $konsumen->namaFileKtp }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </section>
        </div>
    </div>
    @include('template/footer')
</body>
            