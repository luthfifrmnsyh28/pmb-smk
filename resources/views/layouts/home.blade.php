<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        {{ $setting->nama_sekolah ?? 'SMKS PGRI Indramayu' }}
    </title>

    <link
href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css"
rel="stylesheet">

    <meta name="description"
        content="Sistem Penerimaan Murid Baru {{ $setting->nama_sekolah ?? '' }}">

    <link rel="icon" type="image/x-icon"
      href="{{ asset('favicon.ico') }}">

      <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}">

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    {{-- Google Font --}}
    <link rel="preconnect"
        href="https://fonts.googleapis.com">

    <link rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    {{-- AOS --}}
    <link rel="stylesheet"
        href="https://unpkg.com/aos@2.3.4/dist/aos.css">

    {{-- Swiper --}}
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    {{-- Custom CSS --}}
    <link rel="stylesheet"
        href="{{ asset('assets/css/style.css') }}">

        <link
href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css"
rel="stylesheet">

</head>


<body>

<div id="loader">

    <div class="spinner-border text-light"></div>

</div>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top shadow-sm">

    <div class="container">

        <a class="navbar-brand fw-bold"
            href="{{ route('home') }}">

            @if($setting && $setting->logo)

                <img src="{{ asset('storage/'.$setting->logo) }}"
                    width="45"
                    class="me-2">

            @endif

            {{ $setting->nama_sekolah ?? 'SMKS PGRI Indramayu' }}

        </a>

        <button class="navbar-toggler"
            data-bs-toggle="collapse"
            data-bs-target="#navbar">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse"
            id="navbar">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">

                    <a href="#home"
                        class="nav-link">

                        Home

                    </a>

                </li>

                <li class="nav-item">

                    <a href="#profil"
                        class="nav-link">

                        Profil

                    </a>

                </li>

                <li class="nav-item">
    <a href="#visi-misi" class="nav-link">
        Visi Misi
    </a>
</li>

                <li class="nav-item">

                    <a href="#jurusan"
                        class="nav-link">

                        Jurusan

                    </a>

                </li>

                <li class="nav-item">

                    <a href="#jadwal"
                        class="nav-link">

                        Jadwal

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link" href="#galeri">
    Galeri
</a>

                </li>

                <li class="nav-item">

                    <a href="#kontak"
                        class="nav-link">

                        Kontak

                    </a>

                </li>

            </ul>

            <div class="ms-lg-3">

                <a href="{{ route('login') }}"
                    class="btn btn-primary">

                    Login

                </a>

            </div>

        </div>

    </div>

</nav>

<main>

  <main class="main-content">
    @yield('content')
</main>

</main>

<footer id="kontak">

    @yield('footer')

</footer>

<!-- Floating WhatsApp -->
<a href="https://wa.me/6283825735292?text=Halo%20Admin%20PMB,%20saya%20ingin%20bertanya%20tentang%20SPMB."
   class="wa-float"
   target="_blank">

    <div class="wa-popup" id="waPopup">

        <strong>👋 Halo!</strong>

        <p class="mb-1 mt-2">
            Ada yang bisa kami bantu?
        </p>

        <small>Chat Admin SPMB</small>

    </div>

    <div class="wa-button">

        <i class="fab fa-whatsapp"></i>

    </div>

</a>
<button id="backTop">

    <i class="fas fa-arrow-up"></i>

</button>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>

<script src="{{ asset('assets/js/script.js') }}"></script>

<script>

AOS.init({

    duration:1000,

    once:true

});

</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>
<script>
setTimeout(function () {
    const popup = document.getElementById('waPopup');
    if(popup){
        popup.style.opacity = "0";
        popup.style.transform = "translateY(10px)";

        setTimeout(function(){
            popup.style.display = "none";
        },500);
    }
},7000);
</script>
</body>

</html>
<style>
.main-content{
    margin-top:100px;
}
</style>