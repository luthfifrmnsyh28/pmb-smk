<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login | SMKS PGRI Indramayu</title>
    <link rel="icon" type="image/x-icon"
      href="{{ asset('favicon.ico') }}">

      <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class="font-[Poppins] bg-slate-100">

<div class="min-h-screen grid lg:grid-cols-2">

    {{-- ================= LEFT ================= --}}

    <div
        class="hidden lg:flex relative items-center justify-center bg-gradient-to-br from-blue-700 via-blue-600 to-sky-500">

        <img
            src="{{ asset('bg-login.png') }}"
            class="absolute inset-0 w-full h-full object-cover opacity-25">

        <div class="absolute inset-0 bg-blue-900/60"></div>

        <div class="relative z-10 max-w-lg text-white p-12">

            <img
                src="{{ asset('logo.png') }}"
                class="w-28 mb-8">

            <h1 class="text-5xl font-bold leading-tight">
                SPMB ONLINE
            </h1>

            <p class="mt-3 text-2xl font-semibold">
                SMKS PGRI INDRAMAYU
            </p>

            <p class="mt-8 leading-8 text-lg">

                Mencetak lulusan yang siap kerja,
                berkarakter,
                profesional,
                dan berdaya saing.

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

            <img
                src="{{ asset('logo.png') }}"
                class="w-20 mx-auto mb-5">

            <h2 class="text-3xl font-bold text-gray-800">
                Selamat Datang
            </h2>

            <p class="text-gray-500 mt-2">
                Silakan login menggunakan akun Anda
            </p>

        </div>

        @if (session('status'))
            <div class="mt-5 rounded-lg bg-green-100 p-3 text-green-700">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST"
            action="{{ route('login') }}"
            class="mt-8">

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
                    <small class="text-red-600">
                        {{ $message }}
                    </small>
                @enderror

            </div>

            <div class="flex items-center justify-between mt-6">

                <label class="flex items-center gap-2">

                    <input
                        type="checkbox"
                        name="remember"
                        class="rounded">

                    <span class="text-sm">
                        Ingat Saya
                    </span>

                </label>

                @if(Route::has('password.request'))
                    <a
                        href="{{ route('password.request') }}"
                        class="text-blue-600 hover:underline">
                        Lupa Password?
                    </a>
                @endif

            </div>

            <button
                class="w-full mt-8 bg-blue-600 hover:bg-blue-700 duration-300 rounded-xl text-white py-3 font-semibold shadow-lg hover:shadow-xl">

                LOGIN

            </button>

        </form>

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