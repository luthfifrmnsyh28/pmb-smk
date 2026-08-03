@extends('adminlte::page')

@section('title', 'Data Pendaftar')

@section('content_header')
<h1>Data Pendaftar</h1>
@stop

@section('content')

<div class="mb-3">

    <a href="{{ route('pendaftar.create') }}"
       class="btn btn-primary">

        <i class="fas fa-plus"></i>
        Tambah Pendaftar

    </a>

    <a href="{{ route('pendaftar.export') }}"
       class="btn btn-success">

        <i class="fas fa-file-excel"></i>
        Export Excel

    </a>

</div>

@if(session('success'))

<div class="alert alert-success">

    {{ session('success') }}

</div>

@endif

<div class="card mb-3">

    <div class="card-body">

        <form method="GET">

            <div class="row">

                <div class="col-md-3">

                    <input
                        type="text"
                        name="search"
                        class="form-control"
                        placeholder="Cari Nama / No Pendaftaran"
                        value="{{ request('search') }}">

                </div>

                <div class="col-md-2">

                    <select
                        name="status"
                        class="form-control">

                        <option value="">
                            Semua Status
                        </option>

                        <option value="menunggu"
                            {{ request('status')=='menunggu'?'selected':'' }}>

                            Menunggu

                        </option>

                        <option value="diterima"
                            {{ request('status')=='diterima'?'selected':'' }}>

                            Diterima

                        </option>

                        <option value="ditolak"
                            {{ request('status')=='ditolak'?'selected':'' }}>

                            Ditolak

                        </option>

                    </select>

                </div>

                <div class="col-md-2">

                    <select
                        name="jurusan"
                        class="form-control">

                        <option value="">
                            Semua Jurusan
                        </option>

                        @foreach($jurusans as $j)

                        <option
                            value="{{ $j->id }}"
                            {{ request('jurusan')==$j->id ? 'selected':'' }}>

                            {{ $j->nama_jurusan }}

                        </option>

                        @endforeach

                    </select>

                </div>

                <div class="col-md-2">

                    <select
                        name="gelombang"
                        class="form-control">

                        <option value="">
                            Semua Gelombang
                        </option>

                        @foreach($gelombangs as $g)

                        <option
                            value="{{ $g->id }}"
                            {{ request('gelombang')==$g->id ? 'selected':'' }}>

                            {{ $g->nama_gelombang }}

                        </option>

                        @endforeach

                    </select>

                </div>

                <div class="col-md-3">

                    <button class="btn btn-primary">

                        <i class="fas fa-search"></i>

                        Cari

                    </button>

                    <a href="{{ route('pendaftar.index') }}"
                       class="btn btn-secondary">

                        Reset

                    </a>

                </div>

            </div>

        </form>

    </div>

</div>

<div class="card">

    <div class="card-body">

        <table class="table table-bordered table-striped">

            <thead>

                <tr>

                    <th width="50">No</th>

                    <th>No Pendaftaran</th>

                    <th>Nama</th>

                    <th>Jurusan</th>

                    <th>Gelombang</th>

                    <th>Status</th>

                    <th width="280">Aksi</th>

                </tr>

            </thead>

            <tbody>

                @forelse($pendaftars as $p)

                <tr>

                    <td>

                        {{ $pendaftars->firstItem() + $loop->index }}

                    </td>

                    <td>

                        {{ $p->nomor_pendaftaran }}

                    </td>

                    <td>

                        {{ $p->nama_lengkap }}

                    </td>

                    <td>

                        {{ $p->jurusan->nama_jurusan ?? '-' }}

                    </td>

                    <td>

                        {{ $p->gelombang->nama_gelombang ?? '-' }}

                    </td>

                    <td>

                        @if($p->status=='diterima')

                            <span class="badge badge-success">

                                Diterima

                            </span>

                        @elseif($p->status=='ditolak')

                            <span class="badge badge-danger">

                                Ditolak

                            </span>

                        @else

                            <span class="badge badge-warning">

                                Menunggu

                            </span>

                        @endif

                    </td>

                    <td>

                        <a href="{{ route('pendaftar.show',$p) }}"
                           class="btn btn-info btn-sm">

                            <i class="fas fa-eye"></i>

                        </a>

                        <a href="{{ route('pendaftar.edit',$p) }}"
                           class="btn btn-warning btn-sm">

                            <i class="fas fa-edit"></i>

                        </a>

                        <a href="{{ route('pendaftar.cetak',$p) }}"
                           class="btn btn-secondary btn-sm">

                            <i class="fas fa-print"></i>

                        </a>

                        <a href="{{ route('pendaftar.kartu',$p) }}"
                           class="btn btn-success btn-sm">

                            <i class="fas fa-id-card"></i>

                        </a>

                        <form
                            action="{{ route('pendaftar.destroy',$p) }}"
                            method="POST"
                            style="display:inline">

                            @csrf
                            @method('DELETE')

                            <button
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Hapus data ini?')">

                                <i class="fas fa-trash"></i>

                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="7" class="text-center">

                        Belum ada data pendaftar.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

        <div class="mt-3">

            {{ $pendaftars->withQueryString()->links() }}

        </div>

    </div>

</div>

@stop