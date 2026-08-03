@extends('adminlte::page')

@section('title', 'Dashboard Petugas')

@section('content_header')
<h1>Dashboard Petugas PMB</h1>
@stop

@section('content')

<div class="row">

    <div class="col-lg-3 col-6">

        <div class="small-box bg-info">

            <div class="inner">

                <h3>{{ \App\Models\Pendaftar::count() }}</h3>

                <p>Total Pendaftar</p>

            </div>

            <div class="icon">

                <i class="fas fa-users"></i>

            </div>

            <a href="{{ route('pendaftar.index') }}"
               class="small-box-footer">

                Lihat Data

                <i class="fas fa-arrow-circle-right"></i>

            </a>

        </div>

    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box bg-warning">

            <div class="inner">

                <h3>
                    {{ \App\Models\Pendaftar::where('status','menunggu')->count() }}
                </h3>

                <p>Menunggu Verifikasi</p>

            </div>

            <div class="icon">

                <i class="fas fa-clock"></i>

            </div>

        </div>

    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box bg-success">

            <div class="inner">

                <h3>
                    {{ \App\Models\Pendaftar::where('status','diterima')->count() }}
                </h3>

                <p>Diterima</p>

            </div>

            <div class="icon">

                <i class="fas fa-check-circle"></i>

            </div>

        </div>

    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box bg-danger">

            <div class="inner">

                <h3>
                    {{ \App\Models\Pendaftar::where('status','ditolak')->count() }}
                </h3>

                <p>Ditolak</p>

            </div>

            <div class="icon">

                <i class="fas fa-times-circle"></i>

            </div>

        </div>

    </div>

</div>

<div class="row">

    <div class="col-md-8">

        <div class="card">

            <div class="card-header bg-primary">

                <h3 class="card-title">

                    Pendaftar Terbaru

                </h3>

            </div>

            <div class="card-body table-responsive">

                <table class="table table-bordered table-striped">

                    <thead>

                        <tr>

                            <th>No</th>

                            <th>Nama</th>

                            <th>Jurusan</th>

                            <th>Status</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse(\App\Models\Pendaftar::latest()->take(10)->get() as $item)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $item->nama_lengkap }}</td>

                            <td>{{ $item->jurusan->nama_jurusan ?? '-' }}</td>

                            <td>

                                @if($item->status=='diterima')

                                    <span class="badge badge-success">

                                        DITERIMA

                                    </span>

                                @elseif($item->status=='ditolak')

                                    <span class="badge badge-danger">

                                        DITOLAK

                                    </span>

                                @else

                                    <span class="badge badge-warning">

                                        MENUNGGU

                                    </span>

                                @endif

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="4" class="text-center">

                                Belum ada data pendaftar

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card card-primary">

            <div class="card-header">

                <h3 class="card-title">

                    Informasi Petugas

                </h3>

            </div>

            <div class="card-body">

                <p>

                    Selamat Datang

                    <strong>

                        {{ auth()->user()->name }}

                    </strong>

                </p>

                <hr>

                <p>

                    Sebagai petugas PMB Anda dapat:

                </p>

                <ul>

                    <li>Memverifikasi Berkas</li>

                    <li>Melihat Data Pendaftar</li>

                    <li>Mencetak Bukti Pendaftaran</li>

                    <li>Mengecek Status Seleksi</li>

                </ul>

            </div>

        </div>

        <div class="card card-success">

            <div class="card-header">

                <h3 class="card-title">

                    Akses Cepat

                </h3>

            </div>

            <div class="card-body">

                <a href="{{ route('pendaftar.index') }}"
                   class="btn btn-primary btn-block">

                    <i class="fas fa-users"></i>

                    Data Pendaftar

                </a>

                <a href="{{ route('pengumuman') }}"
                   class="btn btn-success btn-block">

                    <i class="fas fa-bullhorn"></i>

                    Pengumuman

                </a>

            </div>

        </div>

    </div>

</div>

@stop