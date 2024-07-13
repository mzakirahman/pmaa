@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    <section class="h-screen ">
        <div class="min-h-screen flex items-center justify-center">
            <div class=" text-center border-2 w-[700px] h-[500px] rounded-xl shadow-xl ">

                <!-- Konten Anda -->
                <h1 class="text-5xl font-bold mb-4 text-primary mt-5">Login</h1>

                <h2 class="text-2xl font-semibold text-secondary capitalize">Pondok pesantren al-amin modern bengkalis
                </h2>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="w-full max-w-sm mx-auto mt-5">
                        <label for="email" class=" w-full font-semibold text-secondary">Email</label>
                        <input type="email" id="email" name="email"
                            class="mt-2 w-full font-semibold text-secondary text-center ring-2 ring-primary rounded-full  h-8">
                    </div>
                    <div class="w-full max-w-sm mx-auto mt-5">
                        <label for="password" class="w-full font-semibold text-secondary">Password</label>
                        <input type="password" id="password" name="password"
                            class="mt-2 w-full font-semibold text-secondary text-center ring-2 ring-primary rounded-full h-8">
                    </div>

                    <button
                        class="mt-10 w-full max-w-sm bg-primary rounded-full shadow-xl text-white bg-lime-400 h-10 hover:scale-110 transition-all duration-500">
                        Login
                    </button>
                </form>
            </div>
        </div>

    </section>
@endsection
