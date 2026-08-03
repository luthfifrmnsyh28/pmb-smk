@extends('adminlte::page')

@section('title', 'Detail Pendaftar')

@section('content_header')
<h1>Detail Pendaftar</h1>
@stop

@section('content')

<div class="card">

    <div class="card-header">
        <h3 class="card-title">
            {{ $pendaftar->nama_lengkap }}
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
                <th>NISN</th>
                <td>{{ $pendaftar->nisn }}</td>
            </tr>

            <tr>
                <th>NIK</th>
                <td>{{ $pendaftar->nik }}</td>
            </tr>

            <tr>
                <th>Jenis Kelamin</th>
                <td>{{ $pendaftar->jenis_kelamin }}</td>
            </tr>

            <tr>
                <th>Tempat Lahir</th>
                <td>{{ $pendaftar->tempat_lahir }}</td>
            </tr>

            <tr>
                <th>Tanggal Lahir</th>
                <td>{{ $pendaftar->tanggal_lahir }}</td>
            </tr>

            <tr>
                <th>Alamat</th>
                <td>{{ $pendaftar->alamat }}</td>
            </tr>

            <tr>
                <th>Asal Sekolah</th>
                <td>{{ $pendaftar->asal_sekolah }}</td>
            </tr>

            <tr>
                <th>No HP</th>
                <td>{{ $pendaftar->no_hp }}</td>
            </tr>

            <tr>
                <th>Nama Ayah</th>
                <td>{{ $pendaftar->nama_ayah }}</td>
            </tr>

            <tr>
                <th>Nama Ibu</th>
                <td>{{ $pendaftar->nama_ibu }}</td>
            </tr>

            <tr>
                <th>Jurusan</th>
                <td>{{ $pendaftar->jurusan->nama_jurusan ?? '-' }}</td>
            </tr>

            <tr>
                <th>Gelombang</th>
                <td>{{ $pendaftar->gelombang->nama_gelombang ?? '-' }}</td>
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

{{-- FOTO PENDAFTAR --}}
@if($pendaftar->foto)

<div class="card">

    <div class="card-header">
        <h3 class="card-title">
            Foto Pendaftar
        </h3>
    </div>

    <div class="card-body text-center">

        <img
            src="{{ asset('storage/'.$pendaftar->foto) }}"
            class="img-thumbnail"
            width="250">

    </div>

</div>

@endif

{{-- BERKAS --}}
@if(
    $pendaftar->ijazah ||
    $pendaftar->kk ||
    $pendaftar->akta
)

<div class="card">

    <div class="card-header">
        <h3 class="card-title">
            Berkas Pendaftaran
        </h3>
    </div>

    <div class="card-body">

        @if($pendaftar->ijazah)
            <a href="{{ asset('storage/'.$pendaftar->ijazah) }}"
               target="_blank"
               class="btn btn-primary">
                <i class="fas fa-file-pdf"></i>
                Lihat Ijazah
            </a>
        @endif

        @if($pendaftar->kk)
            <a href="{{ asset('storage/'.$pendaftar->kk) }}"
               target="_blank"
               class="btn btn-success">
                <i class="fas fa-file"></i>
                Lihat KK
            </a>
        @endif

        @if($pendaftar->akta)
            <a href="{{ asset('storage/'.$pendaftar->akta) }}"
               target="_blank"
               class="btn btn-warning">
                <i class="fas fa-file"></i>
                Lihat Akta
            </a>
        @endif

    </div>

</div>

@endif

<div class="mt-3">
    <a href="{{ route('pendaftar.index') }}"
       class="btn btn-secondary">
        Kembali
    </a>
    <a href="{{ route('pendaftar.kartu',$pendaftar) }}"
class="btn btn-success">

<i class="fas fa-id-card"></i>

Cetak Kartu Peserta

</a>
</div>

@stop