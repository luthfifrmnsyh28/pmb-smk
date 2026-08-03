@extends('adminlte::page')

@section('title', 'Edit Jurusan')

@section('content_header')
<h1>Edit Jurusan</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('jurusan.update', $jurusan) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label>Kode Jurusan</label>
                <input type="text"
                       name="kode_jurusan"
                       class="form-control"
                       value="{{ $jurusan->kode_jurusan }}"
                       required>
            </div>

            <div class="form-group mb-3">
                <label>Nama Jurusan</label>
                <input type="text"
                       name="nama_jurusan"
                       class="form-control"
                       value="{{ $jurusan->nama_jurusan }}"
                       required>
            </div>

            <div class="form-group mb-3">
                <label>Kuota</label>
                <input type="number"
                       name="kuota"
                       class="form-control"
                       value="{{ $jurusan->kuota }}"
                       required>
            </div>

            <div class="form-group mb-3">
                <label>Deskripsi</label>
                <textarea name="deskripsi"
                          class="form-control"
                          rows="4">{{ $jurusan->deskripsi }}</textarea>
            </div>

            <div class="form-group mb-3">
                <label>Status</label>
                <select name="status" class="form-control">

                    <option value="1"
                        {{ $jurusan->status ? 'selected' : '' }}>
                        Aktif
                    </option>

                    <option value="0"
                        {{ !$jurusan->status ? 'selected' : '' }}>
                        Nonaktif
                    </option>

                </select>
            </div>

            <button class="btn btn-primary">
                Update
            </button>

            <a href="{{ route('jurusan.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>
</div>

@stop