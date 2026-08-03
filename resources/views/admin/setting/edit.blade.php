@extends('adminlte::page')

@section('title', 'Profil Sekolah')

@section('content_header')
    <h1>Profil Sekolah</h1>
@stop

@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card">

    <div class="card-header">
        Data Sekolah
    </div>

    <div class="card-body">

        <form action="{{ route('setting.update') }}" method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nama Sekolah</label>
                <input
                    type="text"
                    name="nama_sekolah"
                    class="form-control"
                    value="{{ $setting->nama_sekolah }}">
            </div>

            <div class="form-group">
                <label>NPSN</label>
                <input
                    type="text"
                    name="npsn"
                    class="form-control"
                    value="{{ $setting->npsn }}">
            </div>

            <div class="form-group">
                <label>Akreditasi</label>
                <input
                    type="text"
                    name="akreditasi"
                    class="form-control"
                    value="{{ $setting->akreditasi }}">
            </div>

            <button class="btn btn-primary">
                Simpan
            </button>

        </form>

    </div>

</div>

@stop