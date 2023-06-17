<!DOCTYPE html> 
<head> 
    @include('template/header')
    <title> Tentang Situs Ini </title>
</head>
<body> 
    @include('template/navbar')
    @include('template/sidebar')

    <div class="content-wrapper px-4 py-2"> 
        <div class="content-header">
            <h1> Tentang Situs Ini </h1>
        </div>
        <div class="content px-2">
            <p> situs ini dibuat untuk memenuhi tugas akhir saya. </p>
            <br>
            <p> Situs ini adalah situs untuk mengolah, mengubah, dan menyampaikan informasi mengenai penjualan, pengiriman, administrasi BPKB dan STNK, dan laporan penjualan.  </p>
            <br />
            <p> Situs ini dikembangkan melalui kerangka kerja (<i>Framework</i>) Antar Muka AdminLTE dan beberapa komponen grafis diambil dari situs <a href="https://fontawesome.com/">Font Awesome </a>. Untuk melihat dokumentasi antar muka secara penuh, dapat mengunjungi <a href="https://adminlte.io/themes/v3/"> situs AdminLTE </a> berikut ini. 
            Sedangkan alur pemrosesan data dikembangkan menggunakan kerangka kerja (<i>Framework</i>) Laravel berdasarkan saran-saran yang didapat secara bebas dan terbuka dari internet. </p>
            <p> Akan tetapi, kami mengakui bahwa sistem ini tidaklah sempurna sepenuhnya. Kritik, Masukkan dan Saran kami terima sepenuhnya untuk pengembangan
            situs ini ke depannya agar dapat menjadi lebih baik lagi. </p>
            <p> Apabila terdapat hal-hal yang ingin ditanyakan atau terdapat saran pengguna untuk sistem ini, dapat menyampaikan masukan dan saran melalui: </p> 
            <br />
            <p> PT. Marga Kartika Motor </p>
            <p> Jalan Hayam Wuruk No. 58</p>
            <p> Kelurahan Tanggung, Kecamatan Wlingi</p>
            <p> Kabupaten Blitar, Jawa Timur, Kode Pos 66184</p>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3950.22310018633!2d112.33078371466604!3d-8.078714682995503!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7893df9023749b%3A0xa33d0b934174187e!2sDealer%20Honda%20Marga%20Kartika%20Motor!5e0!3m2!1sid!2sid!4v1668765280820!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        
        </div>
    </div> 
    @include('template/footer')
</body>
</html>