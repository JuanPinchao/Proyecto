<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('index.index') }}" class="brand-link">
        <img src="{{ asset('img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Laravel

        </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset(Auth::user()->file) }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{route('profile.index')}}" class="d-block">
                    <h5>{{ Auth::user()->name }}</h5>
                </a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->

                @can('users.index')
                    <li class="nav-item  {{ request()->is('users*') ? ' menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('users*') ? ' active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Admin
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('users.index') }}"
                                    class="nav-link {{ request()->is('users*') ? ' active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Usuarios</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan

                <li
                    class="nav-item {{ request()->is(['home*', 'categorias*', 'subcategorias*', 'productos*']) ? ' menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ request()->is(['home*', 'categorias*', 'subcategorias*', 'productos*']) ? ' active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('home') }}"
                                class="nav-link {{ request()->is('home*') ? ' active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Home</p>
                            </a>
                        </li>
                        @can('categorias.index')
                            <li class="nav-item">
                                <a href="{{ route('categorias.index') }}"
                                    class="nav-link {{ request()->is('categorias*') ? ' active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Categorias</p>
                                </a>
                            </li>
                        @endcan
                        @can('subcategorias.index')
                            <li class="nav-item">
                                <a href="{{ route('subcategorias.index') }}"
                                    class="nav-link {{ request()->is('subcategorias*') ? ' active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Subcategorias</p>
                                </a>
                            </li>
                        @endcan
                        @can('productos.index')
                            <li class="nav-item">
                                <a href="{{ route('productos.index') }}"
                                    class="nav-link {{ request()->is('productos*') ? ' active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Productos</p>
                                </a>
                            </li>
                        @endcan
                    </ul>

                </li>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>