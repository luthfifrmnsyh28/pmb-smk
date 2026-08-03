@extends('layouts.home')

@section('content')

<section class="py-5">

<div class="container">

<div class="row">

<div class="col-lg-8">

<h1 class="fw-bold">
{{ $berita->judul }}
</h1>

<hr>

@if($berita->thumbnail)

<img src="{{ asset('storage/'.$berita->thumbnail) }}"
     class="img-fluid rounded mb-4">

@endif

{!! $berita->isi !!}

</div>

<div class="col-lg-4">

<div class="card">

<div class="card-header">

Berita Terbaru

</div>

<div class="card-body">

@foreach($terbaru as $item)

<p>

<a href="{{ route('website.berita.show',$item->slug) }}">

{{ $item->judul }}

</a>

</p>

@endforeach

</div>

</div>

</div>

</div>

</div>

</section>

@endsection