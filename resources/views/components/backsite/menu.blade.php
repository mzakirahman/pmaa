<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li
                class="{{ request()->is('backsite/dashboard') || request()->is('backsite/dashboard/*') ? 'active' : '' }}">
                <a href="{{ route('backsite.dashboard.index') }}">
                    <i
                        class="{{ request()->is('backsite/dashboard') || request()->is('backsite/dashboard/*') ? 'bx bx-category-alt bx-flashing' : 'bx bx-category-alt' }}"></i><span
                        class="menu-title" data-i18n="Dashboard">Dashboard</span>
                </a>
            </li>

            <li class=" navigation-header"><span data-i18n="Application">Aplikasi</span><i class="la la-ellipsis-h"
                    data-toggle="tooltip" data-placement="right" data-original-title="Application"></i>
            </li>
            {{-- @can('management_access') --}}
            <li class=" nav-item"><a href="#"><i
                        class="{{ request()->is('backsite/user') || request()->is('backsite/user/*') || request()->is('backsite/*/user') || request()->is('backsite/*/user/*') ? 'bx bx-group bx-flashing' : 'bx bx-group' }}"></i><span
                        class="menu-title" data-i18n="Management Access">Manajemen Akses</span></a>
                <ul class="menu-content">

                    @can('user_access')
                        <li
                            class="{{ request()->is('backsite/user') || request()->is('backsite/user/*') || request()->is('backsite/*/user') || request()->is('backsite/*/user/*') ? 'active' : '' }} ">
                            <a class="menu-item" href="{{ route('backsite.user.index') }}">
                                <i></i><span>User</span>
                            </a>
                        </li>
                    @endcan

                </ul>
            </li>
            {{-- @endcan --}}

            {{-- @can('master_data_access') --}}
            <li class=" nav-item"><a href="#"><i
                        class="{{ request()->is('backsite/permission') || request()->is('backsite/permission/*') || request()->is('backsite/*/permission') || request()->is('backsite/*/permission/*') || request()->is('backsite/jabatan') || request()->is('backsite/jabatan/*') || request()->is('backsite/*/jabatan') || request()->is('backsite/*/jabatan/*') || request()->is('backsite/role') || request()->is('backsite/role/*') || request()->is('backsite/*/role') || request()->is('backsite/*/role/*') || request()->is('backsite/biaya') || request()->is('backsite/biaya/*') || request()->is('backsite/*/biaya') || request()->is('backsite/*/biaya/*') ? 'bx bx-customize bx-flashing' : 'bx bx-customize' }}"></i><span
                        class="menu-title" data-i18n="Master Data">Data Master</span></a>
                <ul class="menu-content">

                    @can('permission_access')
                        <li
                            class="{{ request()->is('backsite/permission') || request()->is('backsite/permission/*') || request()->is('backsite/*/permission') || request()->is('backsite/*/permission/*') ? 'active' : '' }} ">
                            <a class="menu-item" href="{{ route('backsite.permission.index') }}">
                                <i></i><span>Akses</span>
                            </a>
                        </li>
                    @endcan

                    @can('biaya_access')
                        <li
                            class="{{ request()->is('backsite/biaya') || request()->is('backsite/biaya/*') || request()->is('backsite/*/biaya') || request()->is('backsite/*/biaya/*') ? 'active' : '' }} ">
                            <a class="menu-item" href="{{ route('backsite.biaya.index') }}">
                                <i></i><span>Biaya</span>
                            </a>
                        </li>
                    @endcan

                    @can('jabatan_access')
                        <li
                            class="{{ request()->is('backsite/jabatan') || request()->is('backsite/jabatan/*') || request()->is('backsite/*/jabatan') || request()->is('backsite/*/jabatan/*') ? 'active' : '' }} ">
                            <a class="menu-item" href="{{ route('backsite.jabatan.index') }}">
                                <i></i><span>Jabatan</span>
                            </a>
                        </li>
                    @endcan

                    @can('role_access')
                        <li
                            class="{{ request()->is('backsite/role') || request()->is('backsite/role/*') || request()->is('backsite/*/role') || request()->is('backsite/*/role/*') ? 'active' : '' }} ">
                            <a class="menu-item" href="{{ route('backsite.role.index') }}">
                                <i></i><span>Peran</span>
                            </a>
                        </li>
                    @endcan

                </ul>
            </li>
            {{-- @endcan --}}

            {{-- @can('operational_access') --}}
            <li class=" nav-item"><a href="#"><i
                        class="{{ request()->is('backsite/fasilitas') || request()->is('backsite/fasilitas/*') || request()->is('backsite/*/fasilitas') || request()->is('backsite/*/fasilitas/*') || request()->is('backsite/galeri') || request()->is('backsite/galeri/*') || request()->is('backsite/*/galeri') || request()->is('backsite/*/galeri/*') || request()->is('backsite/murid') || request()->is('backsite/murid/*') || request()->is('backsite/*/murid') || request()->is('backsite/*/murid/*') || request()->is('backsite/berita') || request()->is('backsite/berita/*') || request()->is('backsite/*/berita') || request()->is('backsite/*/berita/*') || request()->is('backsite/pengurus') || request()->is('backsite/pengurus/*') || request()->is('backsite/*/pengurus') || request()->is('backsite/*/pengurus/*') ? 'bx bx-hive bx-flashing' : 'bx bx-hive' }}"></i><span
                        class="menu-title" data-i18n="Operational">Operasional</span></a>
                <ul class="menu-content">

                    @can('berita_access')
                        <li
                            class="{{ request()->is('backsite/berita') || request()->is('backsite/berita/*') || request()->is('backsite/*/berita') || request()->is('backsite/*/berita/*') ? 'active' : '' }} ">
                            <a class="menu-item" href="{{ route('backsite.berita.index') }}">
                                <i></i><span>Berita</span>
                            </a>
                        </li>
                    @endcan

                    @can('fasilitas_access')
                        <li
                            class="{{ request()->is('backsite/fasilitas') || request()->is('backsite/fasilitas/*') || request()->is('backsite/*/fasilitas') || request()->is('backsite/*/fasilitas/*') ? 'active' : '' }} ">
                            <a class="menu-item" href="{{ route('backsite.fasilitas.index') }}">
                                <i></i><span>Fasilitas</span>
                            </a>
                        </li>
                    @endcan

                    @can('galeri_access')
                        <li
                            class="{{ request()->is('backsite/galeri') || request()->is('backsite/galeri/*') || request()->is('backsite/*/galeri') || request()->is('backsite/*/galeri/*') ? 'active' : '' }} ">
                            <a class="menu-item" href="{{ route('backsite.galeri.index') }}">
                                <i></i><span>Galeri</span>
                            </a>
                        </li>
                    @endcan

                    @can('murid_access')
                        <li
                            class="{{ request()->is('backsite/murid') || request()->is('backsite/murid/*') || request()->is('backsite/*/murid') || request()->is('backsite/*/murid/*') ? 'active' : '' }} ">
                            <a class="menu-item" href="{{ route('backsite.murid.index') }}">
                                <i></i><span>Murid</span>
                            </a>
                        </li>
                    @endcan

                    @can('pengurus_access')
                        <li
                            class="{{ request()->is('backsite/pengurus') || request()->is('backsite/pengurus/*') || request()->is('backsite/*/pengurus') || request()->is('backsite/*/pengurus/*') ? 'active' : '' }} ">
                            <a class="menu-item" href="{{ route('backsite.pengurus.index') }}">
                                <i></i><span>Pengurus</span>
                            </a>
                        </li>
                    @endcan

                </ul>
            </li>
            {{-- @endcan --}}
        </ul>
    </div>
</div>

<!-- END: Main Menu-->
