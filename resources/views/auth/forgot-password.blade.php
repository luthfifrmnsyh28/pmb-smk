<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Lupa Password | SMKS PGRI Indramayu</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class="font-[Poppins] bg-slate-100">

<div class="min-h-screen grid lg:grid-cols-2">

    {{-- ================= LEFT ================= --}}

    <div class="hidden lg:flex relative items-center justify-center bg-gradient-to-br from-blue-700 via-blue-600 to-sky-500">

        <img
            src="{{ asset('bg-login.png') }}"
            class="absolute inset-0 w-full h-full object-cover opacity-25">

        <div class="absolute inset-0 bg-blue-900/60"></div>

        <div class="relative z-10 max-w-lg text-white p-12">

            <img
                src="{{ asset('logo.png') }}"
                class="w-28 mb-8">

            <h1 class="text-5xl font-bold">
                SPMB ONLINE
            </h1>

            <p class="mt-3 text-2xl font-semibold">
                SMKS PGRI INDRAMAYU
            </p>

            <p class="mt-8 leading-8 text-lg">
                Jangan khawatir jika lupa password. Masukkan alamat email yang terdaftar, kami akan mengirimkan tautan untuk membuat password baru.
            </p>

            <div class="mt-10 space-y-3">

               <div>✔ Akuntansi dan Keuangan Lembaga</div>
                <div>✔ Manajemen Perkantoran dan Layanan Bisnis</div>
                <div>✔ Pemasaran</div>
                <div>✔ Pengembangan Perangkat Lunak dan Gim</div>
                <div>✔ Teknik Otomotif </div>

            </div>

        </div>

    </div>

    {{-- ================= RIGHT ================= --}}

    <div class="flex justify-center items-center p-6">

        <div class="bg-white w-full max-w-md rounded-3xl shadow-2xl p-10">

            <div class="text-center">

                <img
                    src="{{ asset('logo.png') }}"
                    class="w-20 mx-auto mb-5">

                <h2 class="text-3xl font-bold text-gray-800">
                    Lupa Password
                </h2>

                <p class="text-gray-500 mt-2">
                    Masukkan email Anda untuk menerima tautan reset password.
                </p>

            </div>

            @if (session('status'))
                <div class="mt-6 rounded-xl bg-green-100 border border-green-300 p-4 text-green-700">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="mt-8">

                @csrf

                <div>

                    <label class="font-medium text-gray-700">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        class="mt-2 w-full rounded-xl border-gray-300 focus:border-blue-600 focus:ring-blue-600">

                    @error('email')
                        <small class="text-red-600">
                            {{ $message }}
                        </small>
                    @enderror

                </div>

                <button
                    type="submit"
                    class="w-full mt-8 bg-blue-600 hover:bg-blue-700 duration-300 rounded-xl text-white py-3 font-semibold transition">

                    KIRIM LINK RESET PASSWORD

                </button>

            </form>

            <div class="flex items-center my-6">

                <div class="flex-1 border-t border-gray-300"></div>

                <span class="px-4 text-sm text-gray-500">
                    ATAU
                </span>

                <div class="flex-1 border-t border-gray-300"></div>

            </div>

            <a
                href="{{ route('login') }}"
                class="w-full flex justify-center items-center border-2 border-blue-600 text-blue-600 rounded-xl py-3 font-semibold hover:bg-blue-600 hover:text-white transition">

                ← KEMBALI KE LOGIN

            </a>

        </div>

    </div>

</div>

</body>
</html>