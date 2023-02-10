{{-- Main Sidebar Container --}}
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="brand-link">
        <img src="https://i.ibb.co/Yp4tr14/isteq-logo-remake.png" alt=""
            class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">Al-Istiqomah Cianjur</span>
    </div>
    {{-- <div class="brand-link text-center">
        <a href="{{ url('/admin/dashboard') }}">
            <img src="{{ asset('assets') }}/front/images/logo/Logo_Bagian-Kerjasama-dan-Pengembangan-Lembaga-250x50.png"
                alt="" style="width: 100%">
            <b class="brand-text" style="color: #fff;">KERJASAMA</b>
        </a>
    </div> --}}

    <!-- Sidebar -->
    <div class="sidebar" style="overflow-y: auto;">
    <div class="sidebar">
        {{-- Sidebar Menu --}}
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                {{-- <li class="nav-header user-panel pb-3 mb-3" style="text-align: center;">
            MAIN NAVIGATION
            </li> --}}
                <li class="nav-item menu-open">
                    <a href="{{ url('/admin/dashboard') }}"
                        class="nav-link {{ request()->is('admin/dashboard' || 'admin/berita') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display:block; margin:10px">
                        <li class="nav-item">
                            <a href="{{ url('/admin/dashboard') }}"
                                class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Home</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/admin/berita') }}"
                                class="nav-link {{ request()->is('admin/berita') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Berita</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/admin/tentangisteq') }}"
                        class="nav-link {{ request()->is('admin/tentangisteq') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-address-card"></i>
                        <p>
                            Tentang Isteq
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/admin/aksescepat') }}"
                        class="nav-link {{ request()->is('admin/aksescepat') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-forward"></i>
                        <p>
                            Akses Cepat
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/admin/pendaftaran') }}"
                        class="nav-link {{ request()->is('admin/pendaftaran') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-registered"></i>
                        <p>
                            Pendaftaran
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/admin/sma') }}"
                        class="nav-link {{ request()->is('admin/sma') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-school"></i>
                        <p>
                            SMA
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/admin/mts') }}"
                        class="nav-link {{ request()->is('admin/mts') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-school"></i>
                        <p>
                            MTS
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/admin/ra') }}" class="nav-link {{ request()->is('admin/ra') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-school"></i>
                        <p>
                            RA
                        </p>
                    </a>
                </li>
                {{-- <li class="nav-item">
            <form action="/logout" method="post">
               @csrf
               <button type="submit" class="nav-link"><i class="fas fa-sign-out-alt"> Sign Out</i></button>
            </form>
          </li> --}}
            </ul>
        </nav>
    </div>
    <!-- /.sidebar -->
</aside>
