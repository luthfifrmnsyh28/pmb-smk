@extends('adminlte::page')

@section('title','Kepala Sekolah')

@section('content_header')
<h1>Profil Kepala Sekolah</h1>
@stop

@section('content')

<div class="card">

<form action="{{ route('kepala-sekolah.update') }}"
      method="POST"
      enctype="multipart/form-data">

@csrf
@method('PUT')

<div class="card-body">

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="form-group">
    <label>Nama</label>

    <input type="text"
           name="nama"
           class="form-control"
           value="{{ old('nama',$kepsek->nama) }}">
</div>

<div class="form-group">
    <label>NIP</label>

    <input type="text"
           name="nip"
           class="form-control"
           value="{{ old('nip',$kepsek->nip) }}">
</div>

<div class="form-group">
    <label>Jabatan</label>

    <input type="text"
           name="jabatan"
           class="form-control"
           value="{{ old('jabatan',$kepsek->jabatan) }}">
</div>

<div class="form-group">
    <label>Foto</label>

    @if($kepsek->foto)
        <br>
        <img src="{{ asset('storage/'.$kepsek->foto) }}"
             width="120"
             class="img-thumbnail mb-2">
    @endif

    <input type="file"
           name="foto"
           class="form-control">
</div>

<div class="form-group">
    <label>Sambutan Kepala Sekolah</label>

    <textarea
        name="sambutan"
        rows="10"
        class="form-control">{{ old('sambutan',$kepsek->sambutan) }}</textarea>
</div>

</div>

<div class="card-footer">

    <button class="btn btn-primary">
        <i class="fas fa-save"></i>
        Simpan
    </button>

</div>

</form>

</div>

@stop