@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">

            {{-- show error --}}
            @if ($errors->any())
                <div class="alert bg-danger alert-dismissible mb-2" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- breadcumb --}}
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Dashboard</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Aktifitas</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-body">
                {{-- Start Manajemen Akses --}}
                <h3 class="content-header-title mb-1 d-inline-block">Manajemen Akses</h3>
                <div class="row d-flex">
                    <div class="col-xl-3 col-md-6 mb-4">
                        <a href="{{ route('backsite.user.index') }}">
                            <div class="card border-left-danger shadow py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                User</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $userTotal . ' UA' }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72"
                                                viewBox="0 0 24 24"
                                                style="fill: rgba(201, 198, 198, 1);transform: ;msFilter:;">
                                                <path
                                                    d="M12 2A10.13 10.13 0 0 0 2 12a10 10 0 0 0 4 7.92V20h.1a9.7 9.7 0 0 0 11.8 0h.1v-.08A10 10 0 0 0 22 12 10.13 10.13 0 0 0 12 2zM8.07 18.93A3 3 0 0 1 11 16.57h2a3 3 0 0 1 2.93 2.36 7.75 7.75 0 0 1-7.86 0zm9.54-1.29A5 5 0 0 0 13 14.57h-2a5 5 0 0 0-4.61 3.07A8 8 0 0 1 4 12a8.1 8.1 0 0 1 8-8 8.1 8.1 0 0 1 8 8 8 8 0 0 1-2.39 5.64z">
                                                </path>
                                                <path
                                                    d="M12 6a3.91 3.91 0 0 0-4 4 3.91 3.91 0 0 0 4 4 3.91 3.91 0 0 0 4-4 3.91 3.91 0 0 0-4-4zm0 6a1.91 1.91 0 0 1-2-2 1.91 1.91 0 0 1 2-2 1.91 1.91 0 0 1 2 2 1.91 1.91 0 0 1-2 2z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                {{-- End Manajemen Akses --}}

                {{-- Start Data Master --}}
                <h3 class="content-header-title mb-1 d-inline-block">Data Master</h3>
                <div class="row d-flex">
                    <div class="col-xl-3 col-md-6 mb-4">
                        <a href="{{ route('backsite.permission.index') }}">
                            <div class="card border-left-success shadow py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Akses</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                {{ $permissionTotal . ' Akses' }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72"
                                                viewBox="0 0 24 24"
                                                style="fill: rgba(201, 198, 198, 1);transform: ;msFilter:;">
                                                <path
                                                    d="M3.433 17.325 3.079 19.8a1 1 0 0 0 1.131 1.131l2.475-.354C7.06 20.524 8 18 8 18s.472.405.665.466c.412.13.813-.274.948-.684L10 16.01s.577.292.786.335c.266.055.524-.109.707-.293a.988.988 0 0 0 .241-.391L12 14.01s.675.187.906.214c.263.03.519-.104.707-.293l1.138-1.137a5.502 5.502 0 0 0 5.581-1.338 5.507 5.507 0 0 0 0-7.778 5.507 5.507 0 0 0-7.778 0 5.5 5.5 0 0 0-1.338 5.581l-7.501 7.5a.994.994 0 0 0-.282.566zM18.504 5.506a2.919 2.919 0 0 1 0 4.122l-4.122-4.122a2.919 2.919 0 0 1 4.122 0z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <a href="{{ route('backsite.biaya.index') }}">
                            <div class="card border-left-success shadow py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Biaya</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                {{ $biayaTotal . ' Biaya' }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" viewBox="0 0 24 24" style="fill: rgba(201, 198, 198, 1);transform: ;msFilter:;"><path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm0 18a8 8 0 1 1 8-8 8 8 0 0 1-8 8z"></path><path d="M12 11c-2 0-2-.63-2-1s.7-1 2-1 1.39.64 1.4 1h2A3 3 0 0 0 13 7.12V6h-2v1.09C9 7.42 8 8.71 8 10c0 1.12.52 3 4 3 2 0 2 .68 2 1s-.62 1-2 1c-1.84 0-2-.86-2-1H8c0 .92.66 2.55 3 2.92V18h2v-1.08c2-.34 3-1.63 3-2.92 0-1.12-.52-3-4-3z"></path></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <a href="{{ route('backsite.jabatan.index') }}">
                            <div class="card border-left-success shadow py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Jabatan</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                {{ $jabatanTotal . ' Jabatan' }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72"
                                                viewBox="0 0 24 24"
                                                style="fill: rgba(201, 198, 198, 1);transform: ;msFilter:;">
                                                <path
                                                    d="M15 11h7v2h-7zm1 4h6v2h-6zm-2-8h8v2h-8zM4 19h10v-1c0-2.757-2.243-5-5-5H7c-2.757 0-5 2.243-5 5v1h2zm4-7c1.995 0 3.5-1.505 3.5-3.5S9.995 5 8 5 4.5 6.505 4.5 8.5 6.005 12 8 12z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <a href="{{ route('backsite.role.index') }}">
                            <div class="card border-left-success shadow py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Peran</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $roleTotal . ' Peran' }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72"
                                                viewBox="0 0 24 24"
                                                style="fill: rgba(201, 198, 198, 1);transform: ;msFilter:;">
                                                <path
                                                    d="M8 12.052c1.995 0 3.5-1.505 3.5-3.5s-1.505-3.5-3.5-3.5-3.5 1.505-3.5 3.5 1.505 3.5 3.5 3.5zM9 13H7c-2.757 0-5 2.243-5 5v1h12v-1c0-2.757-2.243-5-5-5zm11.294-4.708-4.3 4.292-1.292-1.292-1.414 1.414 2.706 2.704 5.712-5.702z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>
                {{-- End Data Master --}}

                {{-- Start Operasional --}}
                <h3 class="content-header-title mb-1 d-inline-block">Operasional</h3>
                <div class="row d-flex">
                    <div class="col-xl-3 col-md-6 mb-4">
                        <a href="{{ route('backsite.berita.index') }}">
                            <div class="card border-left-primary shadow py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Berita</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                {{ $beritaTotal . ' Berita' }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" viewBox="0 0 24 24" style="fill: rgba(201, 198, 198, 1);transform: ;msFilter:;"><path d="M20 17a1 1 0 0 1-2 0V5a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v13a2 2 0 0 0 2 2h15c1.654 0 3-1.346 3-3V7h-2v10zM12 7h3v2h-3V7zm0 4h3v2h-3v-2zM5 7h5v6H5V7zm0 10v-2h10v2H5z"></path></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <a href="{{ route('backsite.fasilitas.index') }}">
                            <div class="card border-left-primary shadow py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Fasilitas</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                {{ $fasilitasTotal . ' Fasilitas' }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" viewBox="0 0 24 24" style="fill: rgba(201, 198, 198, 1);transform: ;msFilter:;"><path d="M17 10V6l-5 4V6l-5 4V4H2v16h20V6l-5 4zm-8 7H7v-3h2v3zm5 0h-2v-3h2v3zm5 0h-2v-3h2v3z"></path></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <a href="{{ route('backsite.galeri.index') }}">
                            <div class="card border-left-primary shadow py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Galeri</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                {{ $galeriTotal . ' Galeri' }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" viewBox="0 0 24 24" style="fill: rgba(201, 198, 198, 1);transform: ;msFilter:;"><circle cx="7.499" cy="9.5" r="1.5"></circle><path d="m10.499 14-1.5-2-3 4h12l-4.5-6z"></path><path d="M19.999 4h-16c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zm-16 14V6h16l.002 12H3.999z"></path></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <a href="{{ route('backsite.murid.index') }}">
                            <div class="card border-left-primary shadow py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Murid</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                {{ $muridTotal . ' Murid' }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" viewBox="0 0 24 24" style="fill: rgba(201, 198, 198, 1);transform: ;msFilter:;"><path d="M12 2a5 5 0 1 0 5 5 5 5 0 0 0-5-5zm0 8a3 3 0 1 1 3-3 3 3 0 0 1-3 3zm9 11v-1a7 7 0 0 0-7-7h-4a7 7 0 0 0-7 7v1h2v-1a5 5 0 0 1 5-5h4a5 5 0 0 1 5 5v1z"></path></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <a href="{{ route('backsite.pengurus.index') }}">
                            <div class="card border-left-primary shadow py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Pengurus</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                {{ $pengurusTotal . ' Pengurus' }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72"
                                                viewBox="0 0 24 24"
                                                style="fill: rgba(201, 198, 198, 1);transform: ;msFilter:;">
                                                <path
                                                    d="M7.5 6.5C7.5 8.981 9.519 11 12 11s4.5-2.019 4.5-4.5S14.481 2 12 2 7.5 4.019 7.5 6.5zM20 21h1v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h17z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>

            </div>
        </div>
        <!-- END: Content-->
    @endsection

    @push('after-style')
        <style>
            .management-access {
                margin-bottom: 50px;
            }

            .master-data {
                margin-bottom: 50px;
            }

            .card-counter {
                box-shadow: 2px 2px 10px #DADADA;
                margin: 5px;
                padding: 20px 10px;
                background-color: #fff;
                height: 100px;
                border-radius: 5px;
                transition: .3s linear all;
            }

            .card-counter:hover {
                box-shadow: 4px 4px 20px #DADADA;
                transition: .3s linear all;
            }

            .card-counter.primary {
                background-color: #007bff;
                color: #FFF;
            }

            .card-counter.danger {
                background-color: #ef5350;
                color: #FFF;
            }

            .card-counter.success {
                background-color: #66bb6a;
                color: #FFF;
            }

            .card-counter.info {
                background-color: #26c6da;
                color: #FFF;
            }

            .card-counter .count-numbers {
                position: absolute;
                right: 35px;
                top: 20px;
                font-size: 32px;
                display: block;
                color: #ffffff;
            }

            .card-counter .count-name {
                position: absolute;
                right: 35px;
                top: 65px;
                font-style: italic;
                text-transform: capitalize;
                opacity: 0.5;
                display: block;
                font-size: 18px;
                color: #ffffff;
            }

            .card-counter .card-title {
                font-size: large;
                padding-right: 50px;
                font-weight: 900;
                color: #ffffff;
            }

            .card-counter .icon {
                font-size: 8em;
                color: #DADADA;
                opacity: 0.2;
                position: absolute;
                left: 20px;
                bottom: -60%;
                transform: translateY(-50%);
            }
        </style>
    @endpush
