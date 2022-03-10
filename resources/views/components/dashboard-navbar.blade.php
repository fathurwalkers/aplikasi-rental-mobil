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
                <a class="nav-link" href="{{ route('dashboard') }}" data-toggle="modal" data-target="#modalakun{{ $users->id }}"><i class="far fa-square"></i> <span>Akun</span></a>
            </li>

            {{-- MODAL LIHAT INFORMASI AKUN  --}}
            <div class="modal fade" id="modalakun{{ $users->id }}" tabindex="1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h4 class="modal-title">Data Akun</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div class="row mb-4">
                                <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center">
                                    <img src="{{ asset('default-img') }}/male.jpg" alt="" class="img img-thumbnail" width="65%">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <h5 class="fix-text-h5">Nama Lengkap </h5>
                                    <h5 class="fix-text-h5">Username </h5>
                                    <h5 class="fix-text-h5">Hak Akses </h5>
                                    <h5 class="fix-text-h5">Status Pengguna </h5>
                                    <h5 class="fix-text-h5">Email</h5>
                                    <h5 class="fix-text-h5">No. HP / Telepon</h5>
                                </div>
                                <div class="col-sm-8 col-md-8 col-lg-8">
                                    <h5 class="fix-text-h5">: {{ $users->login_nama }} </h5>
                                    <h5 class="fix-text-h5">: {{ $users->login_username }} </h5>
                                    <h5 class="fix-text-h5">
                                        {{-- : <button class="btn btn-md btn-info" type="button"> --}}
                                            {{ $users->login_level }}
                                        {{-- </button> --}}
                                    </h5>
                                    <h5 class="fix-text-h5"> :
                                        @switch($users->login_status)
                                            @case("verified")
                                                {{-- <button class="btn btn-md btn-info px-1" type="button"> --}}
                                                    {{ $users->login_status }}
                                                {{-- </button> --}}
                                                @break
                                            @case("unverified")
                                                {{-- <button class="btn btn-md btn-danger px-1" type="button"> --}}
                                                    {{ $users->login_status }}
                                                {{-- </button> --}}
                                                @break
                                        @endswitch
                                    </h5>
                                    <h5 class="fix-text-h5">: {{ $users->login_email }} </h5>
                                    <h5 class="fix-text-h5">: {{ $users->login_telepon }} </h5>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn gray btn-info" data-dismiss="modal">TUTUP</button>
                        </div>
                    </div>
                </div>
            </div>

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
                @if ($users->login_level == "admin")
                <li><a class="nav-link" href="{{ route('daftar-kendaraan') }}"> Kelola Kendaraan </a></li>
                <li><a class="nav-link" href="{{ route('daftar-penyewaan') }}"> Kelola Penyewaan </a></li>
                @endif

                @if ($users->login_level == "customer")
                <li><a class="nav-link" href=""> Informasi Penyewaan </a></li>
                @endif

              </ul>
            </li>

            @if ($users->login_level == "admin")
            <li class="nav-item dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span> Customer </span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('daftar-customer') }}"> Kelola Customer </a></li>
                {{-- <li><a class="nav-link" href="forms-validation.html">Daftar Blacklist</a></li> --}}
              </ul>
            </li>
            @endif

            {{-- <li><a class="nav-link" href="credits.html"><i class="fas fa-pencil-ruler"></i> <span>Pengaturan</span></a></li> --}}
          </ul>

          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="{{ route('home') }}" class="btn btn-info btn-lg btn-block btn-icon-split">
              <i class="fas fa-rocket"></i> Ke Halaman Utama
            </a>
          </div>
      </aside>
</div>
