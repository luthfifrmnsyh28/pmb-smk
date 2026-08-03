@extends('adminlte::page')

@section('title', 'Tambah Jurusan')

@section('content_header')
<h1>Tambah Jurusan</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('jurusan.store') }}" method="POST">

            @csrf

            <div class="form-group mb-3">
                <label>Kode Jurusan</label>
                <input type="text"
                       name="kode_jurusan"
                       class="form-control"
                       required>
            </div>

            <div class="form-group mb-3">
                <label>Nama Jurusan</label>
                <input type="text"
                       name="nama_jurusan"
                       class="form-control"
                       required>
            </div>

            <div class="form-group mb-3">
                <label>Kuota</label>
                <input type="number"
                       name="kuota"
                       class="form-control"
                       required>
            </div>

            <div class="form-group mb-3">
                <label>Deskripsi</label>
                <textarea name="deskripsi"
                          class="form-control"
                          rows="4"></textarea>
            </div>

            <div class="form-group mb-3">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="1">Aktif</option>
                    <option value="0">Nonaktif</option>
                </select>
            </div>

            <button class="btn btn-success">
                Simpan
            </button>

            <a href="{{ route('jurusan.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>
</div>

@stop