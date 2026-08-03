<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SMKS PGRI Indramayu') }}</title>

    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-[Poppins]">

    <div class="min-h-screen flex">

        {{-- LEFT --}}
        <div
            class="hidden lg:flex w-1/2 relative bg-gradient-to-br from-blue-700 via-blue-600 to-sky-500 overflow-hidden">

            {{-- Background --}}
            <img
                src="{{ asset('images/bg-login.jpg') }}"
                class="absolute inset-0 w-full h-full object-cover opacity-30">

            <div class="absolute inset-0 bg-blue-900/60"></div>

            <div class="relative z-10 flex flex-col justify-center px-16 text-white">

                <img
                    src="{{ asset('images/logo.png') }}"
                    class="w-28 mb-8">

                <h1 class="text-5xl font-bold leading-tight">
                    PPDB ONLINE
                </h1>

                <h2 class="text-3xl font-semibold mt-3">
                    SMKS PGRI INDRAMAYU
                </h2>

                <p class="mt-6 text-lg leading-8 text-blue-100">
                    Mencetak lulusan yang kompeten,
                    profesional, berkarakter,
                    serta siap menghadapi dunia kerja
                    dan dunia industri.
                </p>

                <div class="mt-10 space-y-3 text-lg">

                    <div>✔ Pengembangan Perangkat Lunak & Gim</div>

                    <div>✔ Teknik Sepeda Motor</div>

                    <div>✔ Akuntansi</div>

                    <div>✔ Manajemen Perkantoran</div>

                    <div>✔ Pemasaran</div>

                </div>

            </div>

        </div>

        {{-- RIGHT --}}
        <div
            class="w-full lg:w-1/2 bg-slate-100 flex items-center justify-center p-6">

            <div
                class="w-full max-w-md bg-white rounded-3xl shadow-2xl p-10">

                {{ $slot }}

            </div>

        </div>

    </div>

</body>

</html>