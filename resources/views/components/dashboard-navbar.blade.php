<div>
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
          <a href="index.html">Rendra Rental</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
          <a href="index.html">RR</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>

            <li class="">
                <a class="nav-link" href="{{ route('dashboard') }}"><i class="far fa-square"></i> <span>Beranda</span></a>
            </li>
            <li class="">
                <a class="nav-link" href="{{ route('dashboard') }}"><i class="far fa-square"></i> <span>Akun</span></a>
            </li>

            {{-- <li class="nav-item dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Kelola Akun</span></a>
              <ul class="dropdown-menu">
                  <li><a class="nav-link" href="index.html">Lihat Informasi Akun</a></li>
              </ul>
            </li> --}}

            <li class="menu-header">Menu</li>

            <li class="nav-item dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span> Rental </span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('daftar-kendaraan') }}"> Kelola Kendaraan </a></li>
                <li><a class="nav-link" href="{{ route('daftar-penyewaan') }}"> Kelola Penyewaan </a></li>
                <li><a class="nav-link" href="forms-validation.html"> Laporan </a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span> Customer </span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="forms-advanced-form.html"> Kelola Customer </a></li>
                <li><a class="nav-link" href="forms-validation.html">Daftar Blacklist</a></li>
              </ul>
            </li>

            <li><a class="nav-link" href="credits.html"><i class="fas fa-pencil-ruler"></i> <span>Pengaturan</span></a></li>
          </ul>

          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-info btn-lg btn-block btn-icon-split">
              <i class="fas fa-rocket"></i> Ke Halaman Utama
            </a>
          </div>
      </aside>
</div>
