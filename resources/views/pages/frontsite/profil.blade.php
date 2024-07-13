@extends('layouts.default')

@section('title', 'Profil')

@section('content')
    <!-- hero agenda section start -->
    <section class="w-full container pt-36 mb-52">
        <div class="container">
            <!-- judul halaman -->
            <div id="judul" class="my-10">
                <h2 class="text-3xl font-bold">Profil Pondok Pesantren Al - Amin Modern Bengkalis</h2>
            </div>

            <div class="flex justify-center w-full mb-10">
                <div class="max-w-5xl">
                    <img src="{{ asset('assets/frontsite/images/profil.jpg') }}" alt="profil" class=" rounded-xl">
                </div>
            </div>

            <!-- kata sambutan -->
            <div class="my-3 font-medium text-justify">
                <h3 class="font-bold text-xl mb-3 capitalize">Kata sambutan</h3>
                <p class="text-base text-justify my-3">Yayasan Pendidikan Islam Al Amin Modern adalah Sebuah Lembaga Pendidikan dan Sosial yang telah berhasil bekerjasama dengan Pemerintah Kabupaten Bengkalis mengirim dan mengkaderkan putra/putri terbaik anak Kabupaten Bengkalis untuk melanjutkan pendidikan di berbagai Universitas di Timur Tengah. Antara lain: Universitas Al-Azhar Mesir di Cairo, University Dimasyq di Syiria, dan Universitas Antar Bangsa Malaysia (IIUM) di Malaysia yang kemudian di ikuti Kabupaten Siak dan terakhir Kabupaten Rokan Hilir.</p>
            </div>

            <div class="my-3 font-medium text-justify mb-24">
                <h3 class="font-bold text-xl mt-10 mb-3 capitalize">sejarah</h3>
                <p class="text-base text-justify my-3">Yayasan Pendidikan Islam Al Amin Modern adalah Sebuah Lembaga Pendidikan dan Sosial yang telah berhasil bekerjasama dengan Pemerintah Kabupaten Bengkalis mengirim dan mengkaderkan putra/putri terbaik anak Kabupaten Bengkalis untuk melanjutkan pendidikan di berbagai Universitas di Timur Tengah. Antara lain: Universitas Al-Azhar Mesir di Cairo, University Dimasyq di Syiria, dan Universitas Antar Bangsa Malaysia (IIUM) di Malaysia yang kemudian di ikuti Kabupaten Siak dan terakhir Kabupaten Rokan Hilir.</p>
            </div>

        </div>
    </section>
    <!-- hero agenda section end -->
@endsection
