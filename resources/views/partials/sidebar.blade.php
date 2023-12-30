<aside class="main-sidebar sidebar-light-teal elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('bs/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Teknikal Test Fanatech</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('bs/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                @if (auth()->user()->role == 1)
                    <li class="nav-item">
                        <a href="/" class="nav-link {{ $judul == 'Dashboard' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard

                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/inventory" class="nav-link {{ $judul == 'Inventory' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-dolly-flatbed"></i>
                            <p>
                                Inventory

                            </p>
                        </a>
                    </li>
                @endif
                @if (auth()->user()->role != 3)
                    <li
                        class="nav-item {{ $judul == 'Data Penjualan' || $judul == 'Tambah Penjualan' || $judul == 'Detail Penjualan' ? 'menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ $judul == 'Data Penjualan' || $judul == 'Tambah Penjualan' || $judul == 'Detail Penjualan' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-cart-plus"></i>
                            <p>
                                Data Penjualan
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/sales"
                                    class="nav-link {{ $judul == 'Data Penjualan' || $judul == 'Detail Penjualan' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Riwayat Penjualan</p>
                                </a>
                            </li>
                            @if (auth()->user()->role != 4)
                                <li class="nav-item">
                                    <a href="/sales_add"
                                        class="nav-link {{ $judul == 'Tambah Penjualan' ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tambah Data Penjualan</p>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                @if (auth()->user()->role != 2)
                    <li
                        class="nav-item {{ $judul == 'Data Pembelian' || $judul == 'Tambah Pembelian' || $judul == 'Detail Pembelian' ? 'menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ $judul == 'Data Pembelian' || $judul == 'Tambah Pembelian' || $judul == 'Detail Pembelian' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-shopping-basket"></i>
                            <p>
                                Data Pembelian
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/purchase"
                                    class="nav-link {{ $judul == 'Data Pembelian' || $judul == 'Detail Pembelian' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Riwayat Pembelian</p>
                                </a>
                            </li>
                            @if (auth()->user()->role != 4)
                                <li class="nav-item">
                                    <a href="/purchase_add"
                                        class="nav-link {{ $judul == 'Tambah Pembelian' ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tambah Data Pembelian</p>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

                <li class="nav-item">
                    <a href="/logout" onclick="logout()" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout

                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
