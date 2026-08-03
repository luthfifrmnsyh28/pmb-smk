@extends('adminlte::page')

@section('title','Tambah Guru')

@section('content')

<form action="{{ route('guru.store') }}"
method="POST"
enctype="multipart/form-data">

@csrf

@include('guru.form')

<button class="btn btn-primary">

Simpan

</button>

</form>

@stop