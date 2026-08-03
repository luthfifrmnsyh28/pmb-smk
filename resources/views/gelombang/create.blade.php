@extends('adminlte::page')

@section('title', 'Tambah Gelombang')

@section('content_header')
<h1>Tambah Gelombang</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('gelombang.store') }}"
              method="POST">

            @csrf

            <div class="form-group mb-3">
                <label>Nama Gelombang</label>
                <input type="text"
                       name="nama_gelombang"
                       class="form-control"
                       required>
            </div>

            <div class="form-group mb-3">
                <label>Tanggal Mulai</label>
                <input type="date"
                       name="tanggal_mulai"
                       class="form-control"
                       required>
            </div>

            <div class="form-group mb-3">
                <label>Tanggal Selesai</label>
                <input type="date"
                       name="tanggal_selesai"
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
                <label>Status</label>

                <select name="status"
                        class="form-control">

                    <option value="1">
                        Aktif
                    </option>

                    <option value="0">
                        Nonaktif
                    </option>

                </select>
            </div>

            <button class="btn btn-success">
                Simpan
            </button>

        </form>

    </div>
</div>

@stop