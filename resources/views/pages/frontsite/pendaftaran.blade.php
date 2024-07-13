@extends('layouts.default')

@section('title', 'Berita')

@section('content')
    <!-- hero agenda section start -->
    <section class="w-full container pt-36 mb-52">
        <div class="container">
            <!-- judul halaman -->
            <div id="judul" class="my-10">
                <h2 class="text-3xl font-bold text-center capitalize">Info Pendaftaran <span class="block">Pondok
                        Pesantren Al - Amin Modern Bengkalis</span> </h2>
            </div>

            <!-- navbar pendaftaran -->
            <div class="w-ful flex items-center justify-center text-center">
                <nav class="max-w-5xl  rounded-xl font-semibold">
                    <button data-target="#syarat" class="capitalize py-2 px-3 bg-white rounded-xl">Syarat
                        Pendaftaran</button>
                    <button data-target="#wdt" class="capitalize py-2 px-3 bg-white rounded-xl">Waktu &
                        Tempat</button>
                    <button data-target="#pp" class="capitalize py-2 px-3 bg-white rounded-xl">Panduan
                        Pendaftaran</button>
                    <button data-target="#bp" class="capitalize py-2 px-3 bg-white rounded-xl">Biaya
                        Pendaftaran</button>
                    <button data-target="#fp" class="capitalize py-2 px-3 bg-white rounded-xl">Formulir
                        Pendaftaran</button>
                </nav>
            </div>

            <div class="my-10 text-justify font-medium indent-10 content-section p-6 bg-white shadow-lg rounded-lg"
                id="syarat">
                <h1 class="text-center mb-6 text-3xl font-bold text-gray-800">Syarat Pendaftaran</h1>
                <ul class="list-decimal list-inside space-y-2">
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                    <li>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</li>
                    <li>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</li>
                    <li>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequatur, quia!</li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus reiciendis architecto saepe. Fuga,
                        quam enim?</li>
                </ul>
            </div>


            <div class="my-10 text-justify font-medium indent-10 content-section p-6 bg-white shadow-lg rounded-lg"
                id="wdt">
                <h1 class="text-center mb-6 text-3xl font-bold text-gray-800">Waktu dan Tempat Pendaftaran</h1>
                <p class="text-center text-lg">Waktu: 10 Januari 2024 - 30 Februari 2024</p>
                <p class="text-center text-lg">Tempat: Pondok Pesantren Al-Amin Modern Bengkalis</p>
            </div>

            <div class="my-10 text-justify font-medium indent-10 content-section p-6 bg-white shadow-lg rounded-lg"
                id="pp">
                <h1 class="text-center mb-6 text-3xl font-bold text-gray-800">Panduan Pendaftaran</h1>
                <ul class="list-decimal list-inside space-y-2">
                    <li>Pertama, akses website PPAMB dengan membuka browser dengan akses url "ppamb.com".</li>
                    <li>Kedua, klik pada menu humburger pada kanan atas halaman dan pilih menu pendaftaran.</li>
                    <li>Ketiga, silahkan pilih beberapa menu yang terdapat pada halaman tersebut untuk mendapatkan informasi
                        yang dibutuhkan.</li>
                    <li>Keempat, pilih menu Formulir Pendaftaran yang terdapat pada halaman pendaftaran tersebut.</li>
                    <li>Kemudian yang kelima, download pdf formulir yang telah disediakan oleh pihak PPAMB.</li>
                    <li>Selanjutnya yang keenam, isilah formulir tersebut dengan data yang benar dan valid.</li>
                    <li>Ketujuh, datanglah ke PPAMB dengan membawa formulir yang telah diisi dan juga persyaratan yang harus
                        disiapkan.</li>
                    <li>Kedelapan, serahkan semua berkas kepada pihak petugas PPDB.</li>
                    <li>Selanjutnya, tunggulah sampai petugas memberikan pengumuman melalui website PPAMB.</li>
                    <li>Yang terakhir, jika dinyatakan lulus, silahkan lanjutkan administrasi yang harus diselesaikan.</li>
                </ul>
            </div>

            <div class="my-10 text-justify font-medium indent-10 content-section p-6 bg-white shadow-lg rounded-lg"
                id="bp">
                <h1 class="text-center mb-6 text-3xl font-bold text-gray-800">Biaya Pendaftaran</h1>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    No</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nama Biaya</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Jenis Biaya</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Jumlah Biaya</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($biaya as $key => $biaya_item)
                                <tr data-entry-id="{{ $biaya_item->id }}">
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration ?? '' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $biaya_item->nama ?? '' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $biaya_item->jenis_biaya ?? '' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ 'Rp ' . number_format($biaya_item->jumlah, 0, ',', '.') . ',-' ?? '' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4"
                                        class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">Tidak ada data
                                        biaya pendaftaran.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="my-10 text-justify font-medium indent-10 content-section p-6 bg-white shadow-lg rounded-lg"
                id="fp">
                <h1 class="text-center mb-6 text-3xl font-bold text-gray-800">Formulir Pendaftaran</h1>


                <div class="flex flex-col items-center m-4 p-4 border-b border-gray-200">
                    <p class="text-lg font-semibold mb-2 text-left">Formulir Pendaftaran 1</p>
                    <div class="flex items-center justify-center w-full">
                        <a href="{{ asset('assets/frontsite/file/FORMULIR 1.pdf') }}" download><button
                                class="bg-blue-500 text-white text-left rounded-xl py-2 px-4 hover:bg-blue-700 transition duration-300 mb-2">Download</button></a>
                        <span class="ml-4 text-left text-red-500">FORMULIR 1.pdf</span>
                    </div>
                </div>

                <div class="flex flex-col items-center text-center m-4 p-4 border-b border-gray-200">
                    <p class="text-lg font-semibold mb-2 text-left">Formulir Pendaftaran 2</p>
                    <div class="flex items-center justify-center w-full">
                        <a href="{{ asset('assets/frontsite/file/FORMULIR 2.pdf') }}" download><button
                                class="bg-blue-500 text-white text-left rounded-xl py-2 px-4 hover:bg-blue-700 transition duration-300 mb-2">Download</button></a>
                        <span class="ml-4 text-left text-red-500">FORMULIR 2.pdf</span>
                    </div>
                </div>

                <div class="flex flex-col items-center text-center m-4 p-4">
                    <p class="text-lg font-semibold mb-2 text-left">Formulir Pendaftaran 3</p>
                    <div class="flex items-center justify-center w-full">
                        <a href="{{ asset('assets/frontsite/file/FORMULIR 2.pdf') }}" download><button
                                class="bg-blue-500 text-white text-left rounded-xl py-2 px-4 hover:bg-blue-700 transition duration-300 mb-2">Download</button></a>
                        <span class="ml-4 text-left text-red-500">FORMULIR 3.pdf</span>
                    </div>
                </div>




    </section>
    <!-- hero agenda section end -->
@endsection

@push('after-script')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.content-section:not(:first)').hide();

            $('nav button').on('click', function() {
                var targetId = $(this).data('target');
                $('.content-section').hide();
                $(targetId).show();
            });
        });
    </script>
@endpush
