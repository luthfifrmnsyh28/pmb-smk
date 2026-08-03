@extends('adminlte::page')

@section('title', 'Verifikasi Pendaftar')

@section('content_header')
<h1>Verifikasi Pendaftar</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('pendaftar.update',$pendaftar) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label>Nama Lengkap</label>
                <input type="text"
                       class="form-control"
                       value="{{ $pendaftar->nama_lengkap }}"
                       readonly>
            </div>

            <div class="form-group mb-3">
                <label>Jurusan</label>

                <select name="jurusan_id"
                        class="form-control">

                    @foreach($jurusans as $jurusan)

                    <option value="{{ $jurusan->id }}"
                    {{ $pendaftar->jurusan_id == $jurusan->id ? 'selected' : '' }}>

                        {{ $jurusan->nama_jurusan }}

                    </option>

                    @endforeach

                </select>
            </div>

            <div class="form-group mb-3">
                <label>Status Seleksi</label>

                <select name="status"
                        class="form-control">

                    <option value="menunggu"
                    {{ $pendaftar->status == 'menunggu' ? 'selected' : '' }}>
                        Menunggu
                    </option>

                    <option value="diterima"
                    {{ $pendaftar->status == 'diterima' ? 'selected' : '' }}>
                        Diterima
                    </option>

                    <option value="ditolak"
                    {{ $pendaftar->status == 'ditolak' ? 'selected' : '' }}>
                        Ditolak
                    </option>

                </select>
            </div>

            <button class="btn btn-primary">
                Simpan Verifikasi
            </button>

        </form>

    </div>
</div>

@stop