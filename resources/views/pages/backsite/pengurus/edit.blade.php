@extends('layouts.app')

{{-- set title --}}
@section('title', 'Edit - Pengurus')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">

            {{-- error --}}
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
                    <h3 class="content-header-title mb-0 d-inline-block">Edit Pengurus</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Dashboard</li>
                                <li class="breadcrumb-item">Pengurus</li>
                                <li class="breadcrumb-item active">Edit</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            {{-- forms --}}
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="horizontal-form-layouts">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="horz-layout-basic">Form Input</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collpase show">
                                    <div class="card-body">
                                        <div class="card-text">
                                            <p>Silahkan masukkan data dengan benar <code>required</code>, sebelum
                                                anda menekan tombol submit.</p>
                                        </div>
                                        <form class="form form-horizontal"
                                            action="{{ route('backsite.pengurus.update', [$pengurus->id]) }}" method="POST"
                                            enctype="multipart/form-data">

                                            @method('PUT')
                                            @csrf

                                            <div class="form-body">

                                                <h4 class="form-section"><i class="fa fa-edit"></i> Form Pengurus</h4>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="nama">Nama <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="nama" name="nama"
                                                            class="form-control" placeholder="Nama Lengkap"
                                                            value="{{ old('nama', isset($pengurus) ? $pengurus->nama : '') }}"
                                                            autocomplete="off" required>

                                                        @if ($errors->has('nama'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('nama') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div
                                                    class="form-group row {{ $errors->has('jabatan_id') ? 'has-error' : '' }}">
                                                    <label class="col-md-3 label-control">Jabatan <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <select name="jabatan_id" id="jabatan_id"
                                                            class="form-control select2" required>
                                                            <option
                                                                value="{{ old('jabatan_id', isset($pengurus) ? $pengurus->jabatan_id : '') }}"
                                                                disabled selected>{{ $pengurus->jabatan->nama }}
                                                            </option>
                                                            @foreach ($jabatan as $key => $jabatan_item)
                                                                <option value="{{ $jabatan_item->id }}">
                                                                    {{ $jabatan_item->nama }}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                        @if ($errors->has('jabatan_id'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('jabatan_id') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="kontak">Kontak <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="kontak" name="kontak"
                                                            class="form-control"
                                                            value="{{ old('kontak', isset($pengurus) ? $pengurus->kontak : '') }}"
                                                            autocomplete="off" placeholder="example +628xxxxxxxxxx"
                                                            required>

                                                        @if ($errors->has('kontak'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('kontak') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div
                                                    class="form-group row {{ $errors->has('jenis_kelamin') ? 'has-error' : '' }}">
                                                    <label class="col-md-3 label-control">Jenis Kelamin <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control select2"
                                                            required>
                                                            <option
                                                                value="{{ old('jenis_kelamin', isset($pengurus) ? $pengurus->jenis_kelamin : '') }}"
                                                                disabled selected>
                                                                @if ($pengurus->jenis_kelamin == 'laki-laki')
                                                                    <span>Laki-laki</span>
                                                                @else
                                                                    <span>Perempuan</span>
                                                                @endif
                                                            </option>
                                                            <option value="1">Laki-laki</option>
                                                            <option value="2">Perempuan</option>
                                                        </select>

                                                        @if ($errors->has('jenis_kelamin'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('jenis_kelamin') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="alamat">Alamat <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="alamat" name="alamat"
                                                            class="form-control"
                                                            value="{{ old('alamat', isset($pengurus) ? $pengurus->alamat : '') }}"
                                                            autocomplete="off"
                                                            placeholder="example Jalan Pramuka Gang Haji Ilyas" required>

                                                        @if ($errors->has('alamat'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('alamat') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="foto">Foto <code
                                                            style="color:green;">optional</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <div class="custom-file">
                                                            <input type="file"
                                                                accept="image/png, image/svg, image/jpeg"
                                                                class="custom-file-input" id="foto" name="foto">
                                                            <label class="custom-file-label" for="foto"
                                                                aria-describedby="foto">{{ isset($pengurus->foto) ? basename($pengurus->foto) : 'Pilih Foto' }}</label>
                                                        </div>

                                                        <p class="text-muted"><small class="text-danger">Hanya dapat
                                                                mengunggah 1 file</small><small> dan yang dapat digunakan
                                                                JPEG, SVG, PNG & resolusi harus 100x100, Maksimal ukuran
                                                                file hanya 10
                                                                MegaBytes</small></p>

                                                        @if ($errors->has('foto'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('foto') }}</p>
                                                        @endif

                                                    </div>
                                                </div>

                                            </div>

                                            <div class="form-actions text-right">
                                                <a href="{{ route('backsite.pengurus.index') }}" style="width:120px;"
                                                    class="btn bg-blue-grey text-white mr-1"
                                                    onclick="return confirm('Are you sure want to close this page? , Any changes you make will not be saved.')">
                                                    <i class="ft-x"></i> Batal
                                                </a>
                                                <button type="submit" style="width:120px;" class="btn btn-cyan"
                                                    onclick="return confirm('Are you sure want to save this data ?')">
                                                    <i class="la la-check-square-o"></i> Submit
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </div>
    </div>
    <!-- END: Content-->

@endsection


@push('after-script')
    {{-- inputmask --}}
    <script src="{{ asset('/assets/backsite/third-party/inputmask/dist/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('/assets/backsite/third-party/inputmask/dist/inputmask.js') }}"></script>
    <script src="{{ asset('/assets/backsite/third-party/inputmask/dist/bindings/inputmask.binding.js') }}"></script>

    <script>
        jQuery(document).ready(function($) {
            $('.select-all').click(function() {
                let $select2 = $(this).parent().siblings('.select2-full-bg')
                $select2.find('option').prop('selected', 'selected')
                $select2.trigger('change')
            })

            $('.deselect-all').click(function() {
                let $select2 = $(this).parent().siblings('.select2-full-bg')
                $select2.find('option').prop('selected', '')
                $select2.trigger('change')
            })
        });

        $(function() {
            $(":input").inputmask();
        });
    </script>
@endpush
