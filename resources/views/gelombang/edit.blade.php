@extends('adminlte::page')

@section('title', 'Edit Gelombang')

@section('content_header')
<h1>Edit Gelombang</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('gelombang.update',$gelombang) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label>Nama Gelombang</label>

                <input type="text"
                       name="nama_gelombang"
                       class="form-control"
                       value="{{ $gelombang->nama_gelombang }}">
            </div>

            <div class="form-group mb-3">
                <label>Tanggal Mulai</label>

                <input type="date"
                       name="tanggal_mulai"
                       class="form-control"
                       value="{{ $gelombang->tanggal_mulai }}">
            </div>

            <div class="form-group mb-3">
                <label>Tanggal Selesai</label>

                <input type="date"
                       name="tanggal_selesai"
                       class="form-control"
                       value="{{ $gelombang->tanggal_selesai }}">
            </div>

            <div class="form-group mb-3">
                <label>Kuota</label>

                <input type="number"
                       name="kuota"
                       class="form-control"
                       value="{{ $gelombang->kuota }}">
            </div>

            <div class="form-group mb-3">
                <label>Status</label>

                <select name="status"
                        class="form-control">

                    <option value="1"
                        {{ $gelombang->status ? 'selected' : '' }}>
                        Aktif
                    </option>

                    <option value="0"
                        {{ !$gelombang->status ? 'selected' : '' }}>
                        Nonaktif
                    </option>

                </select>
            </div>

            <button class="btn btn-primary">
                Update
            </button>

        </form>

    </div>
</div>

@stop