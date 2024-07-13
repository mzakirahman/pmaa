@extends('layouts.default')

@section('title', 'Fasilitas')

@section('content')
    <!-- hero agenda section start -->
    <section class="w-full container pt-36 mb-52">
        <div class="container">
            <!-- judul halaman -->
            <div id="judul" class="mt-10">
                <h2 class="text-3xl font-bold">Fasilitas Pondok Pesantren Al - Amin Modern Bengkalis</h2>
            </div>

            <!-- fasilitas -->
            <div class=" grid grid-cols-3 gap-8 mb-56 ml-10 mt-10">
                <!-- 1 -->
                @foreach ($fasilitas as $fasilitas_item)
                <div class="bg-white rounded-xl overflow-hidden h-96 shadow-xl shadow-black">
                    <!-- gambar -->
                    <div class="w-full h-3/4 overflow-hidden relative">
                        <h2 class="absolute z-[999] text-yellow-400 text-base font-bold top-0 p-5 text-shadow-custom">Fasilitas Pondok
                        </h2>
                        <h2 class="absolute z-[999] text-white font-bold italic bottom-0 p-5 text-shadow-custom">{{ $fasilitas_item->judul }}</h2>
                        <img src="{{ url(Storage::url($fasilitas_item->gambar)) }}" alt="berita">
                    </div>
                    <!-- isi -->
                    <div class="items-center  w-full min-w-full">
                        <p class="px-5 py-3 text-justify font-medium">
                            {{ $fasilitas_item->isi }}
                        </p>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- hero agenda section end -->
@endsection
