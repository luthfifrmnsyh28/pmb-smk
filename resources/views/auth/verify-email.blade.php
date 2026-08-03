<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Verifikasi Email | SMKS PGRI Indramayu</title>

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

                Akun Anda hampir siap digunakan.
                Silakan lakukan verifikasi email agar dapat mengakses seluruh layanan SPMB Online.

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
                    class="w-20 mx-auto mb-4">

                <div class="text-6xl mb-4">
                    ✅
                </div>

                <h2 class="text-3xl font-bold text-gray-800">
                    Verifikasi Email
                </h2>

                <p class="text-gray-500 mt-3 leading-7">

                    Terima kasih telah mendaftar.

                    Sebelum melanjutkan, silakan cek email Anda dan klik tautan verifikasi yang telah kami kirimkan.

                </p>

            </div>

            @if (session('status') == 'verification-link-sent')

                <div class="mt-6 rounded-xl bg-green-100 border border-green-300 p-4 text-green-700 text-sm">

                    ✅ Link verifikasi baru telah berhasil dikirim ke alamat email Anda.

                </div>

            @endif

            <form method="POST"
                  action="{{ route('verification.send') }}"
                  class="mt-8">

                @csrf

                <button
                    id="btnVerify"
                    type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl font-semibold transition">

                    📧 KIRIM ULANG EMAIL VERIFIKASI

                </button>

            </form>

            <div class="flex items-center my-6">

                <div class="flex-1 border-t"></div>

                <span class="px-4 text-sm text-gray-500">

                    ATAU

                </span>

                <div class="flex-1 border-t"></div>

            </div>

            <form method="POST"
                  action="{{ route('logout') }}">

                @csrf

                <button
                    type="submit"
                    class="w-full border-2 border-red-500 text-red-500 rounded-xl py-3 font-semibold hover:bg-red-500 hover:text-white transition">

                    ← KEMBALI KE LOGIN

                </button>

            </form>

            <div class="mt-8 text-center text-gray-400 text-sm">

                © {{ date('Y') }}

                <br>

                SMKS PGRI Indramayu

                <br>

                <span class="text-xs">

                    Developed by Tim IT SMKS PGRI Indramayu

                </span>

            </div>

        </div>

    </div>

</div>

<script>

document.querySelector('form').addEventListener('submit',function(){

    const btn=document.getElementById('btnVerify');

    if(btn){

        btn.disabled=true;

        btn.innerHTML='⏳ Mengirim Email...';

    }

});

</script>

</body>

</html>