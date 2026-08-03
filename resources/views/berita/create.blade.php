@extends('adminlte::page')

@section('title','Tambah Berita')

@section('content')

<div class="card">

    <div class="card-header">
        <h3>Tambah Berita</h3>
    </div>

    <form action="{{ route('admin-berita.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="card-body">

            @include('berita.form')

        </div>

        <div class="card-footer">

            <button class="btn btn-primary">
                Simpan
            </button>

        </div>

    </form>

</div>

@stop