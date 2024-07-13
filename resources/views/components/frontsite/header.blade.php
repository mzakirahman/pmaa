<header class="bg-header fixed w-full">
    <div class="relative items-center">

        <div class="mx-auto flex max-w-7xl items-center p-6">
            <div class="mr-3">
                <a href="{{ route('index') }}">
                    <img src="{{ asset('assets/frontsite/images/logo.jpeg') }}" alt="logo" width="100">
                </a>
            </div>

            <div class="text-5xl font-bold italic"> Pondok Pesantren <span class="block">
                    Al - Amin Modern Bengkalis</span></div>
        </div>

        <!-- hamburger menu -->
        <div class="flex items-center px-4">
            <button id="hamburger" name="hamburger" type="button" class="block absolute top-11 right-10 items-center ">
                <span class="hamburger-line transition duration-500 origin-bottom-left"></span>
                <span class="hamburger-line transition duration-500"></span>
                <span class="hamburger-line transition duration-500 origin-bottom-left"></span>
            </button>

            <nav id="nav-menu"
                class="hidden absolute py-5 bg-white shadow-lg rounded-lg max-w-[250px] w-full right-4 top-full ">
                <ul class="block">
                    <li class="group">
                        <a href="{{ route('index') }}"
                            class="text-base text-dark py-2 mx-8 flex group-hover:text-primary">Beranda</a>
                    </li>
                    <li class="group">
                        <a href="{{ route('berita') }}"
                            class="text-base text-dark py-2 mx-8 flex group-hover:text-primary">Berita</a>
                    </li>
                    <li class="group">
                        <a href="{{ route('fasilitas') }}"
                            class="text-base text-dark py-2 mx-8 flex group-hover:text-primary">Fasilitas</a>
                    </li>
                    <li class="group">
                        <a href="{{ route('galeri') }}"
                            class="text-base text-dark py-2 mx-8 flex group-hover:text-primary">Galeri</a>
                    </li>
                    <li class="group">
                        <a href="{{ route('profil') }}"
                            class="text-base text-dark py-2 mx-8 flex group-hover:text-primary">Profil</a>
                    </li>
                    <li class="group">
                        <a href="{{ route('pendaftaran') }}"
                            class="text-base text-dark py-2 mx-8 flex group-hover:text-primary">Info
                            Pendaftaran</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

</header>
