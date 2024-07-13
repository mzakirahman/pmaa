@extends('layouts.default')

@section('title', 'Galeri')

@section('content')

    <!-- hero section start -->
    <section class="w-full container pt-36 mb-52">
        <div class="container">
            <!-- judul halaman -->
            <div id="judul" class="mt-10">
                <h2 class="text-3xl font-bold">Galeri Pondok Pesantren Al - Amin Modern Bengkalis</h2>
            </div>

            <!-- fasilitas -->
            <div class=" grid grid-cols-3 gap-8 mb-56 ml-10 mt-10">
                @foreach ($galeri as $galeri_item)
                    <div class="bg-white rounded-xl overflow-hidden h-96 shadow-xl shadow-black">
                        <!-- gambar -->
                        <div class="w-full h-3/4 overflow-hidden relative">
                            <img src="{{ url(Storage::url($galeri_item->gambar)) }}" alt="berita">
                        </div>
                        <!-- isi -->
                        <div class="items-center  w-full min-w-full">
                            <h2 class="px-5 py-2 leading-none text-justify font-medium capitalize">
                                {{ $galeri_item->judul }}
                            </h2>
                            <span class="px-5 py-3 opacity-50 text-sm">{{ $galeri_item->created_at }}</span>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- hero section end -->

@endsection
