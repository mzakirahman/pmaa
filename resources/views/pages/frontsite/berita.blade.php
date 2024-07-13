@extends('layouts.default')

@section('title', 'Berita')

@section('content')
    <!-- hero agenda section start -->
    <section class="w-full container pt-36 mb-52">
        <div class="container">
            <!-- judul halaman -->
            <div id="judul" class="mt-10">
                <h2 class="text-3xl font-bold">Berita Pondok Pesantren Al - Amin Modern Bengkalis</h2>
            </div>

            <!-- berita utama -->
            @if ($latestBerita)
                <div class="flex w-full justify-between my-16">
                    <div class="items-center">
                        <img src="{{ url(Storage::url($latestBerita->gambar)) }}" alt="" width="350">
                    </div>

                    <div class="w-1/2 mr-20 capitalize">
                        <h2 class="text-2xl font-bold mb-10">{{ $latestBerita->judul }}</h2>

                        <p class="text-justify leading-relaxed font-medium mb-5">{{ $latestBerita->isi }}</p>

                        <span class="opacity-50 font-normal">{{ $latestBerita->created_at }}</span>
                    </div>
                </div>
            @else
                <div class="flex w-full justify-center my-16">
                    <p class="text-2xl font-bold">Tidak ada berita terbaru</p>
                </div>
            @endif


            <!-- berita  -->
            <div class=" grid grid-cols-3 gap-8 mb-56">
                @foreach ($berita as $berita_item)
                    <div class="bg-white rounded-xl overflow-hidden h-96">
                        <!-- gambar -->
                        <div class="w-full h-1/2 overflow-hidden">
                            <img src="{{ url(Storage::url($berita_item->gambar)) }}" alt="berita">
                        </div>
                        <!-- isi -->
                        <div class="items-center  w-full min-w-full">
                            <h3 class="px-5 py-3 font-bold">{{ $berita_item->judul }}</h3>
                            <p class="px-5 py-3 text-justify font-medium">
                                {{ $berita_item->isi }}
                            </p>
                            <span class="p-5 text-base opacity-50">{{ $berita_item->created_at }}</span>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section>
    <!-- hero agenda section end -->
@endsection
