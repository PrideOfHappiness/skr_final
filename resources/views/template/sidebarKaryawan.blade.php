 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('karyawanHome') }}" class="brand-link">
      <img src="{{ asset('style/dist/img/honda-logo-motorcycle-brand-png-16.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Dashboard Karyawan</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info"> 
          <a href="{{ route('karyawanHome')}}" class="d-block">
            @auth
              {{ auth()->user()->nama_karyawan }}
            @endauth
          </a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <!-- Sidebar Menu -->
      <nav class="mt-2"> 
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">Barang Tersedia</li>
          <li class="nav-item"> 
              <a href="/karyawan/barangTersedia" class="nav-link">
                <i class="fa-solid fa-motorcycle"></i>
                  <p>
                    Barang Tersedia
                  </p>
                </a>
          </li>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-header">Input Data</li>
            <li class="nav-item"> 
                <a href="/karyawan/konsumen" class="nav-link">
                  <i class="fa-solid fa-person"></i>
                    <p>
                      Konsumen
                    </p>
                  </a>
            </li>
            <li class="nav-item"> 
                <a href="/karyawan/penjualan" class="nav-link">
                  <i class="fa-solid fa-cart-shopping"></i>
                    <p>
                      Penjualan Sepeda Motor
                    </p>
                  </a>
            </li>
            <li class="nav-item"> 
                <a href="/karyawan/pengiriman" class="nav-link">
                  <i class="fa-solid fa-truck-fast"></i>
                    <p>
                      Pengiriman
                    </p>
                  </a>
            </li>
            <li class="nav-item"> 
              <a href="/karyawan/bpkbstnk" class="nav-link">
                <i class="fa-solid fa-id-card"></i>
                  <p>
                    BPKB dan STNK
                  </p>
                </a>
          </li>
            <li class="nav-header">Logout</li>
            <li class="nav-item menu-open"> 
                <a href="{{ route('logout') }}" class="nav-link active">
                  <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    <p>
                      Keluar Dari Sistem
                    </p>
                </a>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside >
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->