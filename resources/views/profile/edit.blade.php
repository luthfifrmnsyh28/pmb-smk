@extends('adminlte::page')

@section('title', 'Profil Saya')

@section('content_header')
    <h1>Profil Saya</h1>
@stop

@section('content')

<div class="row">

    <div class="col-md-4">

        <div class="card card-primary card-outline">
            <div class="card-body text-center">

                <img class="img-fluid img-circle mb-3"
                     width="120"
                     src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}"
                     alt="Profile">

                <h4>{{ auth()->user()->name }}</h4>

                <p class="text-muted">
                    {{ auth()->user()->getRoleNames()->first() }}
                </p>

            </div>
        </div>

    </div>

    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Informasi Akun</h3>
            </div>

            <div class="card-body">

                <table class="table table-bordered">

                    <tr>
                        <th width="200">Nama</th>
                        <td>{{ auth()->user()->name }}</td>
                    </tr>

                    <tr>
                        <th>Email</th>
                        <td>{{ auth()->user()->email }}</td>
                    </tr>

                    <tr>
                        <th>Role</th>
                        <td>{{ auth()->user()->getRoleNames()->first() }}</td>
                    </tr>

                    <tr>
                        <th>Bergabung</th>
                        <td>{{ auth()->user()->created_at->format('d-m-Y') }}</td>
                    </tr>

                </table>

            </div>
        </div>

        @if(auth()->user()->hasRole('siswa') && $pendaftar)

        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="card-title">Data Pendaftaran PMB</h3>
            </div>

            <div class="card-body">

                <table class="table table-bordered">

                    <tr>
                        <th width="200">No Pendaftaran</th>
                        <td>{{ $pendaftar->nomor_pendaftaran }}</td>
                    </tr>

                    <tr>
                        <th>NISN</th>
                        <td>{{ $pendaftar->nisn }}</td>
                    </tr>

                    <tr>
                        <th>Nama Lengkap</th>
                        <td>{{ $pendaftar->nama_lengkap }}</td>
                    </tr>

                    <tr>
                        <th>Jurusan</th>
                        <td>{{ $pendaftar->jurusan?->nama_jurusan }}</td>
                    </tr>

                    <tr>
                        <th>Gelombang</th>
                        <td>{{ $pendaftar->gelombang?->nama_gelombang }}</td>
                    </tr>

                    <tr>
                        <th>Status</th>
                        <td>
                            @if($pendaftar->status == 'diterima')
                                <span class="badge badge-success">DITERIMA</span>
                            @elseif($pendaftar->status == 'ditolak')
                                <span class="badge badge-danger">DITOLAK</span>
                            @else
                                <span class="badge badge-warning">MENUNGGU</span>
                            @endif
                        </td>
                    </tr>

                </table>

            </div>
        </div>

        @endif

    </div>

</div>

@stop