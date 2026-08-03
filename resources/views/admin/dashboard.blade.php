@extends('adminlte::page')

@section('title', 'Dashboard Admin')

@section('content_header')
<h1>Dashboard Admin PMB</h1>
@stop

@section('content')

<div class="row">

    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $totalPendaftar }}</h3>
                <p>Total Pendaftar</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-graduate"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $diterima }}</h3>
                <p>Diterima</p>
            </div>
            <div class="icon">
                <i class="fas fa-check-circle"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $menunggu }}</h3>
                <p>Menunggu</p>
            </div>
            <div class="icon">
                <i class="fas fa-clock"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $ditolak }}</h3>
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
            <div class="card-header">
                <h3 class="card-title">
                    Profil Sekolah
                </h3>
            </div>

            <div class="card-body">

                <h4>{{ $setting->nama_sekolah ?? 'SMKS PGRI Indramayu' }}</h4>

                <table class="table table-bordered">

                    <tr>
                        <th width="200">Alamat</th>
                        <td>{{ $setting->alamat ?? '-' }}</td>
                    </tr>

                    <tr>
                        <th>Telepon</th>
                        <td>{{ $setting->telepon ?? '-' }}</td>
                    </tr>

                    <tr>
                        <th>Email</th>
                        <td>{{ $setting->email ?? '-' }}</td>
                    </tr>

                    <tr>
                        <th>Website</th>
                        <td>{{ $setting->website ?? '-' }}</td>
                    </tr>

                </table>

            </div>
        </div>

    </div>

    <div class="col-md-4">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Statistik Sistem
                </h3>
            </div>

            <div class="card-body">

                <ul class="list-group">

                    <li class="list-group-item">
                        Jurusan
                        <span class="float-right">
                            {{ $totalJurusan }}
                        </span>
                    </li>

                    <li class="list-group-item">
                        Gelombang
                        <span class="float-right">
                            {{ $totalGelombang }}
                        </span>
                    </li>

                    <li class="list-group-item">
                        Pendaftar
                        <span class="float-right">
                            {{ $totalPendaftar }}
                        </span>
                    </li>

                </ul>

            </div>
        </div>

    </div>

</div>

@stop