@extends('adminlte::page')

@section('title','Edit Guru')

@section('content')

<form action="{{ route('guru.update',$guru) }}"
method="POST"
enctype="multipart/form-data">

@csrf
@method('PUT')

@include('guru.form')

<button class="btn btn-success">

Update

</button>

</form>

@stop