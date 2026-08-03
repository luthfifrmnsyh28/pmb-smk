<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Register | SMKS PGRI Indramayu</title>
    <link rel="icon" type="image/x-icon"
      href="{{ asset('favicon.ico') }}">

      <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

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
                Bergabunglah menjadi bagian dari sekolah yang mencetak lulusan siap kerja, profesional dan berkarakter.
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

<div class="flex flex-col justify-center items-center p-6 bg-slate-100">

    <div class="bg-white w-full max-w-md rounded-3xl shadow-2xl p-10">

        <div class="text-center">

            <img src="{{ asset('logo.png') }}" class="w-20 mx-auto mb-4">

            <h2 class="text-3xl font-bold text-gray-800">
                Daftar Akun
            </h2>

            <p class="text-gray-500 mt-2">
                Silakan isi data berikut
            </p>

        </div>

        <form method="POST" action="{{ route('register') }}" class="mt-8">

            @csrf

            <div>

                <label class="font-medium text-gray-700">
                    Nama Lengkap
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    class="mt-2 w-full rounded-xl border-gray-300 focus:border-blue-600 focus:ring-blue-600">

                @error('name')
                    <small class="text-red-600">{{ $message }}</small>
                @enderror

            </div>

            <div class="mt-5">

                <label class="font-medium text-gray-700">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    class="mt-2 w-full rounded-xl border-gray-300 focus:border-blue-600 focus:ring-blue-600">

                @error('email')
                    <small class="text-red-600">{{ $message }}</small>
                @enderror

            </div>

            <div class="mt-5">

                <label class="font-medium text-gray-700">
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    required
                    class="mt-2 w-full rounded-xl border-gray-300 focus:border-blue-600 focus:ring-blue-600">

                @error('password')
                    <small class="text-red-600">{{ $message }}</small>
                @enderror

            </div>

            <div class="mt-5">

                <label class="font-medium text-gray-700">
                    Konfirmasi Password
                </label>

                <input
                    type="password"
                    name="password_confirmation"
                    required
                    class="mt-2 w-full rounded-xl border-gray-300 focus:border-blue-600 focus:ring-blue-600">

            </div>

            <button
                type="submit"
                class="w-full mt-8 bg-blue-600 hover:bg-blue-700 rounded-xl text-white py-3 font-semibold transition shadow-lg hover:shadow-xl">

                DAFTAR SEKARANG

            </button>

        </form>

        <div class="flex items-center my-6">

            <div class="flex-1 border-t"></div>

            <span class="px-4 text-sm text-gray-500">
                ATAU
            </span>

            <div class="flex-1 border-t"></div>

        </div>

        <div class="text-center">

            <p class="text-gray-600">
                Sudah mempunyai akun?
            </p>

            <a
                href="{{ route('login') }}"
                class="inline-flex justify-center items-center w-full mt-4 border-2 border-blue-600 text-blue-600 rounded-xl py-3 font-semibold hover:bg-blue-600 hover:text-white transition">

                LOGIN

            </a>

        </div>

    </div>

    {{-- Footer Premium --}}
    <div class="mt-8 text-center">

        <div class="bg-white rounded-2xl shadow-lg px-8 py-4 border border-slate-100">

            <div class="font-bold text-blue-700">
                © {{ date('Y') }} SMKS PGRI Indramayu
            </div>

            <div class="text-sm text-gray-600 mt-1">
                Sistem Penerimaan Murid Baru (SPMB Online)
            </div>

            <div class="text-xs text-gray-400 mt-1">
                Developed with ❤️ by IT SMKS PGRI Indramayu
            </div>

        </div>

    </div>

</div>

</body>
</html>