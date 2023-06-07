<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Ubah Data Administrasi BPKB dan STNK</title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarKaryawan')
    
    <div class="container"> 
        <div class="mt-4"> 
            <section class="content"> 
                <form action="{{ route('bpkbstnk.update', $bpkb_stnk->id) }}" method="post"> 
                    @csrf
                    @method('PUT')

                    <div class="mb-3 form-group"> 
                        <input type="radio" name="jenis" id="stnkRadio" value="stnk" onclick="toggleFields()"> STNK dan Nopol Selesai<br>
                        <input type="radio" name="jenis" id="bpkbRadio" value="bpkb" onclick="toggleFields()"> BPKB selesai <br>

                        <label for="nopolLama">Nomor Polisi Awal</label>
                        <input type="text" name="nopolLama" class="form-control" id="nopolLama" value="{{ $bpkb_stnk->no_plat }}">

                        <label for="namaPenerima" >Nama Penerima</label>
                        <input type="text" class="form-control" name="namaPenerima" id="namaPenerima" value="{{ $bpkb_stnk->penjualan->konsumen->nama }}">

                        <div id="stnkFields">
                            <div class="mb-3">
                                <label for="nopolInput">Nomor Polisi</label>
                                <input type="text" class="form-control" name="nopol" id="nopolInput" placeholder="Data Nomor Polisi Sesuai STNK">
                            </div>

                            <div class="mb-3"> 
                                <label for="namaPengambilInput">Nama Pengambil</label>
                                <input type="text" class="form-control" name="namaPengambil" id="namaPengambilInput" placeholder="Data Nomor Polisi Sesuai STNK">
                            </div>

                            <label for="ktpPengambilInput">Nomor KTP Pengambil</label>
                            <input type="text" class="form-control" name="ktp_pengambil" id="ktpPengambilInput" placeholder="Nomor KTP">

                            <label for="alamatPengambilInput">Alamat Pengambil</label>
                            <input type="text" class="form-control" name="alamat_pengambil" id="alamatPengambilInput" placeholder="Data Nomor Polisi Sesuai STNK">
                        </div>

                        <div id="bpkbFields">
                            <label for="noBpkbInput">Nomor BPKB</label>
                            <input type="text" class="form-control" name="no_bpkb" id="noBpkbInput" placeholder="Data Nomor BPKB">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah Data</button>
                </form>
            </section>
        </div>
    </div>
    @include('template/footer')
    <script>
        function toggleFields() {
            var stnkRadio = document.getElementById("stnkRadio");
            var bpkbRadio = document.getElementById("bpkbRadio");
            var stnkFields = document.getElementById("stnkFields");
            var bpkbFields = document.getElementById("bpkbFields");

            if (stnkRadio.checked) {
                stnkFields.style.display = "block";
                bpkbFields.style.display = "none";
            } else if (bpkbRadio.checked) {
                stnkFields.style.display = "none";
                bpkbFields.style.display = "block";
            }
        }
    </script>
</body>
</html>