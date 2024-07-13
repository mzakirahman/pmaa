@extends('layouts.default')

@section('title', 'Home')

@section('content')
    <section class="w-full container pt-36">
        <div class="pt-24 flex w-full justify-between">
            <div class=" items-center">
                <img src="{{ asset('assets/frontsite/images/hero1.png') }}" alt="" width="500">
            </div>

            <div class="w-1/2 mr-20 capitalize">
                <h2 class="text-5xl font-bold mb-10">pondok pesantren
                    <span class="block">al-amin modern bengkalis</span>
                </h2>

                <p class="text-justify leading-relaxed font-medium">Yayasan Pendidikan Islam Al Amin Modern adalah Sebuah
                    Lembaga
                    Pendidikan dan Sosial yang telah berhasil bekerjasama dengan Pemerintah
                    Kabupaten Bengkalis mengirim dan mengkaderkan putra/putri terbaik anak
                    Kabupaten Bengkalis untuk melanjutkan pendidikan di berbagai Universitas
                    di Timur Tengah. Antara lain: Universitas Al-Azhar Mesir di Cairo, University
                    Dimasyq di Syiria, dan Universitas Antar Bangsa Malaysia (IIUM) di Malaysia
                    yang kemudian di ikuti Kabupaten Siak dan terakhir Kabupaten Rokan Hilir.
                    Setelah pendidikan tingkat SMP berjalan sejak tahun 2006 hingga saat ini,
                    maka Dengan bekal semangat, dukungan dan doa dari segenap pengurus
                    Yayasan serta pihak lainnya, kemudian di buka pendidikan tingkat SMU,
                    kini dengan sebutan SMA AL-AMIN, untuk pertama kalinya pendaftaran,
                    penerimaan siswa baru, dan berlangsungnya pendidikan dimulai pada
                    tahun pelajaran 2012/2013. Untuk kelancaran dan perkembangan proses
                    kegiatan belajar mengajar di SMA Al-Amin maka berbagai fasilitas terus
                    disempurnakan sehingga akan menjadi berlangsungnya kegiatan pendidikan
                    yang menyenangkan, menarik dan mencerdaskan.</p>
            </div>
        </div>
    </section>
@endsection
