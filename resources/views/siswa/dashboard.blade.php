@extends('adminlte::page')

@section('title', 'Dashboard Siswa')

@section('content_header')
<h1>Dashboard Siswa</h1>
@stop

@section('content')

@php
$pendaftar = auth()->user()->pendaftar;
@endphp

@if($pendaftar)

<div class="row">

    <div class="col-md-4">

        <div class="card card-primary">

            <div class="card-body text-center">

                @if($pendaftar->foto)

                    <img src="{{ asset('storage/'.$pendaftar->foto) }}"
                         width="180"
                         class="img-thumbnail">

                @else

                    <img src="https://ui-avatars.com/api/?name={{ urlencode($pendaftar->nama_lengkap) }}"
                         width="180"
                         class="img-thumbnail">

                @endif

                <hr>

                <h3>{{ $pendaftar->nama_lengkap }}</h3>

                <h5>{{ $pendaftar->nomor_pendaftaran }}</h5>

                @if($pendaftar->status == 'diterima')

                    <span class="badge badge-success">
                        DITERIMA
                    </span>

                @elseif($pendaftar->status == 'ditolak')

                    <span class="badge badge-danger">
                        DITOLAK
                    </span>

                @else

                    <span class="badge badge-warning">
                        MENUNGGU VERIFIKASI
                    </span>

                @endif

            </div>

        </div>

    </div>

    <div class="col-md-8">

        <div class="card">

            <div class="card-header">

                <h3 class="card-title">
                    Biodata Pendaftaran
                </h3>

            </div>

            <div class="card-body">

                <table class="table table-bordered">

                    <tr>
                        <th width="250">Nomor Pendaftaran</th>
                        <td>{{ $pendaftar->nomor_pendaftaran }}</td>
                    </tr>

                    <tr>
                        <th>Nama Lengkap</th>
                        <td>{{ $pendaftar->nama_lengkap }}</td>
                    </tr>

                    <tr>
                        <th>Email</th>
                        <td>{{ auth()->user()->email }}</td>
                    </tr>

                    <tr>
                        <th>Jurusan</th>
                        <td>{{ $pendaftar->jurusan->nama_jurusan }}</td>
                    </tr>

                    <tr>
                        <th>Gelombang</th>
                        <td>{{ $pendaftar->gelombang->nama_gelombang }}</td>
                    </tr>

                    <tr>
                        <th>Status</th>

                        <td>

                            @if($pendaftar->status == 'diterima')

                                <span class="badge badge-success">
                                    DITERIMA
                                </span>

                            @elseif($pendaftar->status == 'ditolak')

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

                </table>

            </div>

        </div>

        <a href="{{ route('pendaftar.cetak',$pendaftar) }}"
           class="btn btn-primary">

            <i class="fas fa-print"></i>

            Cetak Bukti

        </a>

        <a href="{{ route('pendaftar.kartu',$pendaftar) }}"
           class="btn btn-success">

            <i class="fas fa-id-card"></i>

            Cetak Kartu

        </a>

    </div>

</div>

@else

<div class="card">

    <div class="card-body text-center">

        <i class="fas fa-user-plus fa-5x text-primary"></i>

        <br><br>

        <h2>Anda Belum Melakukan Pendaftaran</h2>

        <p>
            Silakan lengkapi formulir PPDB terlebih dahulu.
        </p>

        <a href="{{ route('pendaftaran.saya') }}"
           class="btn btn-primary btn-lg">

            <i class="fas fa-edit"></i>

            Isi Formulir Pendaftaran

        </a>

    </div>

</div>

@endif

@stop