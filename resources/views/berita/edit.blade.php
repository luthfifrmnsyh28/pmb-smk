@extends('adminlte::page')

@section('title','Edit Berita')

@section('content')

<div class="card">

    <div class="card-header">
        <h3 class="card-title">
            Edit Berita
        </h3>
    </div>

    <form action="{{ route('admin-berita.update',$berita->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="card-body">

            @include('berita.form')

        </div>

        <div class="card-footer">

            <button class="btn btn-success">

                <i class="fas fa-save"></i>

                Update

            </button>

        </div>

    </form>

</div>

@stop