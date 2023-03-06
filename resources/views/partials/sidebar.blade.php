<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Data Rumah Sakit</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel d-flex mt-3 mb-3 pb-3">
            <div class="image">
                <img src="{{ asset('dist/img/avatar.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a class="d-block">{{ auth()->user()->username }}</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-weight="treeview" role="menu" data-accordion="false">
                <li class="nav-header">Data</li>
                <li class="nav-item">
                    <a href="/dashboard/rumah_sakit" class="nav-link">
                        <i class="nav-icon fas fa-car"></i>
                        <p>
                            Rumah Sakit
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/dashboard/pasien" class="nav-link">
                        <i class="nav-icon fa-solid fa-screwdriver-wrench"></i>
                        <p>
                            Pasien
                        </p>
                    </a>
                </li>
                @can('admin')
                    <ul class="nav nav-pills nav-sidebar flex-column" data-weight="treeview" role="menu" data-accordion="false">
                        <li class="nav-header">USER</li>
                        <li class="nav-item">
                            <a href="/dashboard/akun" class="nav-link">
                                <i class="nav-icon far fa-user"></i>
                                <p>
                                    Akun
                                </p>
                            </a>
                        </li>
                    </ul>
                @endcan
        </nav>
    </div>
</aside>
