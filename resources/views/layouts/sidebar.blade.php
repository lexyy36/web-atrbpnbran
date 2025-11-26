<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-clipboard-list"></i>
                </div>
                <div class="sidebar-brand-text mx-2" style="font-size: 0.95rem;">ABSENSI BPN</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading" style="color: rgba(255, 255, 255, 0.7);">Data Master</div>

            <!-- Nav Item - Jabatan -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('jabatan.index') }}">
                    <i class="fas fa-fw fa-briefcase"></i>
                    <span>Jabatan</span>
                </a>
            </li>

            <!-- Nav Item - Pegawai -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('pegawai.index') }}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Pegawai</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading" style="color: rgba(255, 255, 255, 0.7);">Operasional</div>

            <!-- Nav Item - Absensi -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('absensi.index') }}">
                    <i class="fas fa-fw fa-clipboard-check"></i>
                    <span>Absensi Pegawai</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

        </ul>