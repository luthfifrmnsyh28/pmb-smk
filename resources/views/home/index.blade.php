@php
$sliders = \App\Models\Slider::where('aktif', 1)
            ->orderBy('urutan')
            ->get();
@endphp

@extends('layouts.home')

@section('content')


<!-- HERO -->
<section id="home">

<div id="heroSlider"
     class="carousel slide carousel-fade"
     data-bs-ride="carousel">
<div class="carousel-indicators">

    @foreach($sliders as $key => $slider)

        <button
            type="button"
            data-bs-target="#heroSlider"
            data-bs-slide-to="{{ $key }}"
            class="{{ $key == 0 ? 'active' : '' }}">
        </button>

    @endforeach

</div>
    <div class="carousel-inner">

    @foreach($sliders as $key => $slider)
<div class="carousel-item {{ $key == 0 ? 'active' : '' }}">

    <img src="{{ asset('storage/'.$slider->gambar) }}"
         class="d-block w-100 hero-image">

    <div class="hero-overlay"></div>

    <div class="carousel-caption">

        <h1>{{ $slider->judul }}</h1>

        <p>{{ $slider->sub_judul }}</p>

        <div class="mt-4">

            <a href="{{ route('register') }}"
               class="btn btn-warning btn-lg">

                <i class="fas fa-user-plus"></i>
                Daftar Sekarang

            </a>

            <a href="{{ route('pengumuman') }}"
               class="btn btn-success btn-lg">

                <i class="fas fa-search"></i>
                Cek Pengumuman

            </a>

        </div>

    </div>

</div>
@endforeach

</div>

    <button class="carousel-control-prev"
            type="button"
            data-bs-target="#heroSlider"
            data-bs-slide="prev">

        <span class="carousel-control-prev-icon"></span>

    </button>

    <button class="carousel-control-next"
            type="button"
            data-bs-target="#heroSlider"
            data-bs-slide="next">

        <span class="carousel-control-next-icon"></span>

    </button>

</div>

</section>
<!-- ============================= -->
<!-- STATISTIK -->
<!-- ============================= -->

<section class="py-5 bg-light">

<div class="container">

<div class="row text-center">

<div class="col-lg-3 col-md-6 mb-4">

<div class="counter-card shadow">

<i class="fas fa-user-graduate fa-3x text-primary mb-3"></i>

<h2 class="counter">

{{ $totalPendaftar }}

</h2>

<h5>Total Pendaftar</h5>

</div>

</div>

<div class="col-lg-3 col-md-6 mb-4">

<div class="counter-card shadow">

<i class="fas fa-school fa-3x text-success mb-3"></i>

<h2 class="counter">

{{ $totalJurusan }}

</h2>

<h5>Program Keahlian</h5>

</div>

</div>

<div class="col-lg-3 col-md-6 mb-4">
    <div class="counter-card shadow">

        <i class="fas fa-calendar-alt fa-3x text-warning mb-3"></i>

        <h2 class="counter">
            {{ $totalGelombang }}
        </h2>

        <h5>Gelombang Aktif</h5>

    </div>
</div>

<div class="col-lg-3 col-md-6 mb-4">

<div class="counter-card shadow">

<i class="fas fa-award fa-3x text-danger mb-3"></i>

<h2>

95%

</h2>

<h5>Lulusan Bekerja</h5>

</div>

</div>

</div>

</div>

</section>

<!-- ========================= -->
<!-- SAMBUTAN KEPALA SEKOLAH -->
<!-- ========================= -->

<section class="py-5">

    <div class="container">

        <div class="row align-items-center">

   <div class="col-lg-8 order-lg-1">

        <span class="badge bg-primary px-3 py-2 mb-3">
            Sambutan Kepala Sekolah
        </span>

        <h2 class="fw-bold mb-2">
            {{ $kepsek->nama ?? 'Kepala Sekolah' }}
        </h2>

        <h5 class="text-primary mb-4">
            {{ $kepsek->jabatan ?? 'SMKS PGRI Indramayu' }}
        </h5>

        <div class="text-muted"
             style="text-align:justify;line-height:1.9;">

            {!! nl2br(e($kepsek->sambutan ?? 'Belum ada sambutan Kepala Sekolah.')) !!}

        </div>

    </div>

    <div class="col-lg-4 text-center order-lg-2">

        @if($kepsek && $kepsek->foto)

            <img
                src="{{ asset('storage/'.$kepsek->foto) }}"
                class="img-fluid rounded-4 shadow kepsek-img"
                style="max-height:450px;object-fit:cover;">

        @else

            <img
                src="https://ui-avatars.com/api/?name=Kepala+Sekolah&background=0D6EFD&color=fff&size=400"
                class="img-fluid rounded-4 shadow kepsek-img">

        @endif

    </div>

</div>

        </div>

    </div>

</section>

<!-- ============================= -->
<!-- TENTANG SEKOLAH -->
<!-- ============================= -->

<section id="profil" class="py-5">

<div class="container">

<div class="row align-items-center">

<div class="col-lg-6"
data-aos="fade-right">

<img
src="{{ asset('assets/img/sekolah.png') }}"
class="img-fluid rounded shadow">

</div>

<div class="col-lg-6"
data-aos="fade-left">

<h6 class="text-primary">

TENTANG SEKOLAH

</h6>

<h2 class="fw-bold mb-4">

{{ $setting->nama_sekolah }}

</h2>

<p style="text-align: justify !important;">

{{ $setting->profil ?? 'SMKS PGRI Indramayu merupakan sekolah menengah kejuruan yang berkomitmen menyelenggarakan pendidikan berkualitas untuk mencetak lulusan yang berkarakter, kompeten, dan siap bersaing di dunia kerja maupun melanjutkan pendidikan ke jenjang yang lebih tinggi.

Dengan didukung tenaga pendidik yang profesional, fasilitas pembelajaran yang memadai, serta kerja sama dengan dunia usaha dan dunia industri (DUDI), SMKS PGRI Indramayu terus menghadirkan pembelajaran yang relevan dengan perkembangan teknologi dan kebutuhan dunia kerja.

Melalui berbagai program keahlian, kegiatan akademik maupun nonakademik, sekolah berupaya mengembangkan potensi peserta didik agar menjadi generasi yang kreatif, inovatif, disiplin, serta memiliki jiwa kepemimpinan dan semangat berkarya untuk masa depan yang lebih baik.' }}

</p>

<div class="mt-4">

<a href="#jurusan"
class="btn btn-primary">

Lihat Jurusan

</a>

</div>

</div>

</div>

</div>

</section>

<!--====================================-->
<!-- VIDEO PROFIL SEKOLAH -->
<!--====================================-->

<section id="video-profil" class="py-5 bg-light">

    <div class="container">

        <div class="text-center mb-5">

            <h6 class="text-primary fw-bold">
                VIDEO PROFIL
            </h6>

            <h2 class="fw-bold">
                Profil SMKS PGRI Indramayu
            </h2>

            <p class="text-muted">
                Kenali lebih dekat lingkungan belajar, fasilitas, dan berbagai kegiatan di
                SMKS PGRI Indramayu melalui video profil sekolah.
            </p>

        </div>

        <div class="row justify-content-center">

            <div class="col-lg-9">

                <div class="ratio ratio-16x9 shadow rounded-4 overflow-hidden">

                   <iframe width="560" height="315" src="https://www.youtube.com/embed/YSfvjKkMUE4?si=JxOlIhQf1YXPg_gz" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- ============================= -->
<!-- VISI & MISI -->
<!-- ============================= -->

<section id="visi" class="py-5 bg-light">

    <div class="container">

        <div class="text-center mb-5">

            <span class="badge bg-primary px-4 py-2 rounded-pill">
                Profil Sekolah
            </span>

            <h2 class="fw-bold mt-3">
                Visi & Misi SMKS PGRI Indramayu
            </h2>

            <p class="text-muted col-lg-7 mx-auto mt-3">
                SMKS PGRI Indramayu berkomitmen mencetak lulusan yang
                unggul, berkarakter, profesional, serta siap menghadapi
                dunia kerja maupun dunia usaha.
            </p>

        </div>

       <div class="visi-wrapper">

    <!-- VISI -->
    <div class="card shadow-lg border-0 rounded-4 mb-4 visi-card">

        <div class="card-body text-center py-5 px-4">

            <div class="visi-icon mb-4">
                <i class="fas fa-eye"></i>
            </div>

            <h3 class="text-primary fw-bold mb-4">
                VISI
            </h3>

            <p class="visi-text">
                {{ $visiMisi->visi }}
            </p>

        </div>

    </div>

    <!-- MISI -->
    <div class="card shadow-lg border-0 rounded-4">

        <div class="card-header bg-primary text-white py-3">
            <h4 class="mb-0">
                <i class="fas fa-bullseye me-2"></i>
                MISI SEKOLAH
            </h4>
        </div>

        <div class="card-body p-5">

            <div class="misi-text">
                {!! nl2br(e($visiMisi->misi)) !!}
            </div>

        </div>

    </div>

</div>
        </div>

    </div>

</section>

<!-- ========================= -->
<!-- GURU & TENAGA PENDIDIK -->
<!-- ========================= -->

<section class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <span class="badge bg-primary px-3 py-2 mb-3">
                Tenaga Pendidik
            </span>

            <h2 class="fw-bold">
                Guru & Staff SMKS PGRI Indramayu
            </h2>

            <p class="text-muted">
                Didukung tenaga pendidik profesional,
                berpengalaman dan kompeten di bidangnya.
            </p>

        </div>

        <div class="swiper guruSwiper">

            <div class="swiper-wrapper">

                @forelse($gurus as $guru)

                <div class="swiper-slide">

                    <div class="card guru-card border-0 shadow-sm">

                        <div class="guru-foto">

                            <img
                                src="{{ asset('storage/'.$guru->foto) }}"
                                alt="{{ $guru->nama }}">

                        </div>

                        <div class="card-body text-center">

                            <h5 class="guru-nama">
                                {{ $guru->nama }}
                            </h5>

                            <span class="guru-jabatan">
                                {{ $guru->jabatan }}
                            </span>

                        </div>

                    </div>

                </div>

                @empty

                <div class="alert alert-info">
                    Data guru belum tersedia.
                </div>

                @endforelse

            </div>

            <div class="swiper-pagination"></div>

        </div>

    </div>

</section>

<script>
document.addEventListener('DOMContentLoaded', function () {

    new Swiper(".guruSwiper", {

        loop: true,

        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },

        spaceBetween: 25,

        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },

        breakpoints: {
            320: {
                slidesPerView: 1
            },
            576: {
                slidesPerView: 2
            },
            992: {
                slidesPerView: 4
            }
        }

    });

});
</script>

<!-- ============================ -->
<!-- PROGRAM KEAHLIAN -->
<!-- ============================ -->

<section id="jurusan" class="py-5">

    <div class="container">

        <!-- Heading -->
        <div class="text-center mb-5">

            <span class="badge bg-primary px-3 py-2 mb-3">
                Program Keahlian
            </span>

            <h2 class="fw-bold mb-3">
                Pilihan Jurusan SMKS PGRI Indramayu
            </h2>

            <p class="text-muted col-lg-7 mx-auto">
                Pilih program keahlian yang sesuai dengan minat, bakat,
                dan cita-citamu untuk mempersiapkan masa depan yang lebih baik.
            </p>

        </div>

        <!-- Card Jurusan -->
        <div class="row justify-content-center g-4">

    @foreach($jurusans as $jurusan)

    <div class="col-lg-4 col-md-6 d-flex">

        <div class="card shadow-sm border-0 rounded-4 w-100 jurusan-card">

            <div class="card-body text-center p-4">

                {{-- Icon --}}
                <div class="jurusan-icon mb-4">

                    @php
                        $icon = match($jurusan->kode_jurusan ?? '') {
                            'PPLG' => 'fas fa-laptop-code',
                            'TSM'  => 'fas fa-motorcycle',
                            'AKL'  => 'fas fa-calculator',
                            'MPLB' => 'fas fa-briefcase',
                            'PM'   => 'fas fa-store',
                            default => 'fas fa-graduation-cap',
                        };
                    @endphp

                    <i class="{{ $icon }}"></i>

                </div>

                <h4 class="fw-bold mb-3">
                    {{ $jurusan->nama_jurusan }}
                </h4>

                <p class="text-muted mb-4">
                    {{ Str::limit($jurusan->deskripsi,120) }}
                </p>

                <a href="#pendaftaran" class="btn btn-primary rounded-pill px-4">
                    Selengkapnya
                </a>

            </div>

        </div>

    </div>

    @endforeach

</div>
    </div>

</section>

<!--==================================
ALUR PENDAFTARAN
===================================-->

<section id="alur" class="py-5">

<div class="container">

<div class="text-center mb-5">

<h6 class="text-primary">

ALUR PENDAFTARAN

</h6>

<h2 class="fw-bold">

Langkah Mudah Menjadi Siswa

{{ $setting->nama_sekolah }}

</h2>

<p>

Ikuti langkah berikut untuk melakukan
pendaftaran secara online.

</p>

</div>

<div class="timeline">

<div class="timeline-item" data-aos="fade-right">

<div class="circle">

1

</div>

<div class="content">

<h4>

Buat Akun

</h4>

<p>

Calon siswa membuat akun menggunakan email aktif.

</p>

</div>

</div>

<div class="timeline-item" data-aos="fade-left">

<div class="circle">

2

</div>

<div class="content">

<h4>

Lengkapi Formulir

</h4>

<p>

Isi seluruh biodata dengan lengkap dan benar.

</p>

</div>

</div>

<div class="timeline-item" data-aos="fade-right">

<div class="circle">

3

</div>

<div class="content">

<h4>

Upload Berkas

</h4>

<p>

Unggah KK, Akta, Ijazah, dan Foto.

</p>

</div>

</div>

<div class="timeline-item" data-aos="fade-left">

<div class="circle">

4

</div>

<div class="content">

<h4>

Verifikasi

</h4>

<p>

Panitia memverifikasi seluruh data.

</p>

</div>

</div>

<div class="timeline-item" data-aos="fade-right">

<div class="circle">

5

</div>

<div class="content">

<h4>

Pengumuman

</h4>

<p>

Cek hasil seleksi melalui website.

</p>

</div>

</div>

<div class="timeline-item" data-aos="fade-left">

<div class="circle">

6

</div>

<div class="content">

<h4>

Daftar Ulang

</h4>

<p>

Lakukan daftar ulang sesuai jadwal.

</p>

</div>

</div>

</div>

</div>

</section>

<!--============================-->
<!-- JADWAL PENDAFTARAN -->
<!--============================-->

<section id="jadwal" class="py-5 bg-light">

<div class="container">

<div class="text-center mb-5">

<h6 class="text-primary">

JADWAL PENDAFTARAN

</h6>

<h2 class="fw-bold">

Gelombang Pendaftaran

</h2>

<p class="text-muted">

Jadwal penerimaan peserta didik baru.

</p>

</div>

<div class="row">

@foreach($gelombangs as $gelombang)

<div class="col-lg-4 mb-4">

<div class="jadwal-card">

<div class="icon">

<i class="fas fa-calendar-alt"></i>

</div>

<h4>

{{ $gelombang->nama_gelombang }}

</h4>

<p>

{{ \Carbon\Carbon::parse($gelombang->tanggal_mulai)->translatedFormat('d F Y') }}

<br>

s/d

<br>

{{ \Carbon\Carbon::parse($gelombang->tanggal_selesai)->translatedFormat('d F Y') }}

</p>

@php
    $today = now();

    $mulai = \Carbon\Carbon::parse(
        $gelombang->tanggal_mulai
    );

    $selesai = \Carbon\Carbon::parse(
        $gelombang->tanggal_selesai
    );
@endphp

@if(!$gelombang->status)

    <span class="badge bg-danger">
        Ditutup
    </span>

@elseif($today->lt($mulai))

    <span class="badge bg-warning text-dark">
        Akan Datang
    </span>

@elseif($today->gt($selesai))

    <span class="badge bg-danger">
        Ditutup
    </span>

@else

    <span class="badge bg-success">
        Dibuka
    </span>

@endif

</div>

</div>

@endforeach

</div>

</div>

</section>

<!-- ==========================
KEUNGGULAN SEKOLAH
=========================== -->

<section class="py-5">

<div class="container">

<div class="text-center mb-5">

<h6 class="text-primary">
KENAPA MEMILIH KAMI
</h6>

<h2 class="fw-bold">
Keunggulan SMKS PGRI Indramayu
</h2>

<p class="text-muted">
Sekolah unggul yang siap mencetak lulusan kompeten,
berkarakter dan siap kerja.
</p>

</div>

<div class="row g-4">

<div class="col-md-4" data-aos="fade-up">

<div class="feature-card">

<i class="fas fa-book-open"></i>

<h4>Kurikulum Merdeka</h4>

<p>
Pembelajaran sesuai kebutuhan dunia kerja dan industri.
</p>

</div>

</div>

<div class="col-md-4" data-aos="fade-up" data-aos-delay="100">

<div class="feature-card">

<i class="fas fa-industry"></i>

<h4>Praktik Industri</h4>

<p>
PKL di perusahaan dan dunia usaha terpercaya.
</p>

</div>

</div>

<div class="col-md-4" data-aos="fade-up" data-aos-delay="200">

<div class="feature-card">

<i class="fas fa-briefcase"></i>

<h4>Bursa Kerja Khusus</h4>

<p>
Membantu penyaluran lulusan ke dunia kerja.
</p>

</div>

</div>

<div class="col-md-4" data-aos="fade-up">

<div class="feature-card">

<i class="fas fa-chalkboard-teacher"></i>

<h4>Guru Profesional</h4>

<p>
Didukung tenaga pendidik berpengalaman dan kompeten.
</p>

</div>

</div>

<div class="col-md-4" data-aos="fade-up" data-aos-delay="100">

<div class="feature-card">

<i class="fas fa-flask"></i>

<h4>Teaching Factory</h4>

<p>
Pembelajaran berbasis produksi dan dunia industri.
</p>

</div>

</div>

<div class="col-md-4" data-aos="fade-up" data-aos-delay="200">

<div class="feature-card">

<i class="fas fa-trophy"></i>

<h4>Prestasi Siswa</h4>

<p>
Aktif mengikuti berbagai lomba akademik dan non akademik.
</p>

</div>

</div>

</div>

</div>

</section>

<!-- ==========================
PRESTASI SEKOLAH
========================== -->

<section class="prestasi-section py-5 bg-light">

<div class="container">

<div class="text-center mb-5">

<h6 class="text-primary">

PRESTASI SEKOLAH

</h6>

<h2 class="fw-bold">

Prestasi dan Pencapaian

</h2>

<p class="text-muted">

Berbagai prestasi yang telah diraih oleh peserta didik
SMKS PGRI Indramayu.

</p>

</div>

<div class="row">

<div class="col-md-3 mb-4">

<div class="prestasi-card">

<div class="prestasi-icon">

🏆

</div>

<h5>

Juara LKS

</h5>

<p>

Lomba Kompetensi Siswa Tingkat Kabupaten.

</p>

</div>

</div>

<div class="col-md-3 mb-4">

<div class="prestasi-card">

<div class="prestasi-icon">

🥇

</div>

<h5>

Juara O2SN

</h5>

<p>

Olimpiade Olahraga Siswa Nasional.

</p>

</div>

</div>

<div class="col-md-3 mb-4">

<div class="prestasi-card">

<div class="prestasi-icon">

🎭

</div>

<h5>

Juara FLS2N

</h5>

<p>

Festival dan Lomba Seni Siswa Nasional.

</p>

</div>

</div>

<div class="col-md-3 mb-4">

<div class="prestasi-card">

<div class="prestasi-icon">

🤖

</div>

<h5>

Juara Teknologi

</h5>

<p>

Kompetisi IT dan Inovasi Teknologi.

</p>

</div>

</div>

</div>

</div>

</section>

<div class="row mt-4">

<div class="col-md-3 col-6">

<div class="counter-box">

<h2>150+</h2>

<p>Prestasi</p>

</div>

</div>

<div class="col-md-3 col-6">

<div class="counter-box">

<h2>5000+</h2>

<p>Alumni</p>

</div>

</div>

<div class="col-md-3 col-6">

<div class="counter-box">

<h2>50+</h2>

<p>Mitra Industri</p>

</div>

</div>

<div class="col-md-3 col-6">

<div class="counter-box">

<h2>95%</h2>

<p>Terserap Kerja</p>

</div>

</div>

</div>

<div class="position-relative">

    <div class="swiper galeriSwiper">

        <div class="swiper-wrapper">

            @foreach($galeris as $galeri)

            <div class="swiper-slide">

    <div class="card">

        <img src="{{ asset('storage/'.$galeri->foto) }}"
             class="card-img-top"
             alt="{{ $galeri->judul }}">

        <div class="card-body">

            <span class="badge bg-primary mb-2">
                {{ $galeri->kategori->nama ?? '-' }}
            </span>

            <h5 class="card-title">
                {{ $galeri->judul }}
            </h5>

            <p class="text-muted">
                {{ Str::limit($galeri->deskripsi,80) }}
            </p>

        </div>

    </div>

</div>

            @endforeach

        </div>

        <div class="swiper-pagination"></div>

        <div class="swiper-button-prev"></div>

        <div class="swiper-button-next"></div>

    </div>

</div>
<!-- ==========================
TESTIMONI
========================== -->

<section class="py-5 bg-light">

<div class="container">

<div class="text-center mb-5">

<h6 class="text-primary">
TESTIMONI ALUMNI
</h6>

<h2 class="fw-bold">
Apa Kata Alumni?
</h2>

</div>

<div class="row">

<div class="col-md-4 mb-4">

<div class="testimonial-card">

<div class="stars">
★★★★★
</div>

<p>
"Belajar di SMKS PGRI Indramayu sangat menyenangkan dan membantu saya siap bekerja."
</p>

<h5>
Andi Saputra
</h5>

<small>
Alumni PPLG
</small>

</div>

</div>

<div class="col-md-4 mb-4">

<div class="testimonial-card">

<div class="stars">
★★★★★
</div>

<p>
"Guru-gurunya kompeten dan fasilitas praktiknya lengkap."
</p>

<h5>
Nur Aisyah
</h5>

<small>
Alumni AKL
</small>

</div>

</div>

<div class="col-md-4 mb-4">

<div class="testimonial-card">

<div class="stars">
★★★★★
</div>

<p>
"Saya langsung bekerja setelah lulus berkat program BKK."
</p>

<h5>
Rizki Maulana
</h5>

<small>
Alumni TSM
</small>

</div>

</div>

</div>

</div>

</section>

<!-- ==========================
CTA
========================== -->

<section class="cta-section">

<div class="container text-center">

<h2 class="fw-bold text-white">

Ayo Daftar Sekarang!

</h2>

<p class="text-white">

Jadilah bagian dari SMKS PGRI Indramayu dan raih masa depan terbaikmu.

</p>

<a href="{{ route('register') }}"
class="btn btn-warning btn-lg me-2">

Daftar Sekarang

</a>

<a href="{{ route('pengumuman') }}"
class="btn btn-outline-light btn-lg">

Cek Pengumuman

</a>

</div>

</section>

<!-- ==========================
MAPS
========================== -->

<section id="maps" class="py-5">

<div class="container">

<div class="text-center mb-5">

<h6 class="text-primary">
LOKASI SEKOLAH
</h6>

<h2 class="fw-bold">
Temukan Kami
</h2>

</div>

<div class="ratio ratio-21x9">

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3268.364858920859!2d108.33743227499137!3d-6.340976593648743!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6eb94c15555555%3A0xe86953b3d6b93e59!2sSMK%20Pgri%20Indramayu!5e1!3m2!1sid!2sid!4v1785685441045!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>

</div>

</div>

</section>

<style>

.guru-card{
    background:#fff;
    border-radius:20px;
    padding:20px;
    text-align:center;
    height:100%;
    box-shadow:0 8px 25px rgba(0,0,0,.08);
    transition:.3s;
}

.guru-card:hover{
    transform:translateY(-8px);
    box-shadow:0 15px 35px rgba(0,0,0,.15);
}

.guru-foto{
    width:100%;
    height:260px;
    overflow:hidden;
    border-radius:20px;
    margin-bottom:15px;
}

.guru-foto img{
    width:100%;
    height:100%;
    object-fit:cover;
    border-radius:20px;
}

.guru-nama{
    font-weight:700;
    font-size:20px;
    color:#1e293b;
    margin-bottom:10px;
}

.guru-jabatan{
    display:inline-block;
    background:#2563eb;
    color:white;
    padding:6px 14px;
    border-radius:30px;
    font-size:13px;
    font-weight:600;
}

</style>
@endsection

@section('footer')

<div class="footer-premium">

    <div class="container">

        <div class="row">

            <div class="col-md-4">

                <h4>
                    {{ $setting->nama_sekolah }}
                </h4>

                <p>
                    Sekolah unggul yang menghasilkan lulusan
                    berkarakter, kompeten dan siap kerja.
                </p>

            </div>

            <div class="col-md-4">

                <h5>Menu</h5>

                <ul class="footer-menu">

                    <li>
                        <a href="#home">Home</a>
                    </li>

                    <li>
                        <a href="#profil">Profil</a>
                    </li>

                    <li>
                        <a href="#jurusan">Jurusan</a>
                    </li>

                    <li>
                        <a href="#gallery">Galeri</a>
                    </li>

                    <li>
                        <a href="#maps">Lokasi</a>
                    </li>

                </ul>

            </div>

            <div class="col-md-4">

                <h5>Kontak</h5>

                <p>
                    📍Jl. Ir. H. Juanda No.256, Karanganyar, Kec. Indramayu, Kabupaten Indramayu, Jawa Barat 45218
                </p>

                <p>
                    📞 0234272449
                </p>

                <p>
                    ✉ smkpgriindramayu@gmail.com
                </p>

            </div>

        </div>

        <hr>

        <div class="text-center">

            © {{ date('Y') }}
            {{ $setting->nama_sekolah }}

        </div>

    </div>

</div>

<style>

.visi-section{
    background:#f8fafc;
}

.title-line{
    width:80px;
    height:4px;
    background:#0d6efd;
    border-radius:10px;
    margin-top:10px;
}

.visi-card{
    border-radius:25px;
}

.icon-visi{
    width:90px;
    height:90px;
    background:linear-gradient(135deg,#0d6efd,#4f8cff);
    color:white;
    border-radius:50%;
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:36px;
}

.card-modern{
    border-radius:20px;
    overflow:hidden;
    transition:.3s ease;
}

.card-modern:hover{
    transform:translateY(-6px);
    box-shadow:0 20px 40px rgba(0,0,0,.12)!important;
}

.content-text{
    line-height:1.9;
    color:#555;
    text-align:justify;
}

.visi-card .lead{
    line-height:1.9;
    color:#444;
}

</style>

<style>

.jurusan-card{
    transition:.3s;
    overflow:hidden;
}

.jurusan-card:hover{
    transform:translateY(-10px);
    box-shadow:0 18px 40px rgba(0,0,0,.15)!important;
}

.jurusan-icon{
    width:90px;
    height:90px;
    margin:auto;
    border-radius:50%;
    background:linear-gradient(135deg,#0d6efd,#4f9dff);
    display:flex;
    align-items:center;
    justify-content:center;
}

.jurusan-icon i{
    font-size:38px;
    color:#fff;
}

.jurusan-card h4{
    font-size:22px;
    min-height:56px;
}

.jurusan-card p{
    height:72px;
    overflow:hidden;
    line-height:1.7;
}

.jurusan-card .btn{
    font-weight:600;
    padding:10px 28px;
}

</style>

@endsection

<style>

.kepsek-img{
    transition:.3s;
}

.kepsek-img:hover{
    transform:translateY(-5px);
}

</style>