@extends('adminlte::page')

@section('title','Guru')

@section('content')

<a href="{{ route('guru.create') }}"
class="btn btn-primary mb-3">

Tambah Guru

</a>

<table class="table table-bordered">

<tr>

<th>Foto</th>
<th>Nama</th>
<th>Jabatan</th>
<th>Status</th>
<th>Aksi</th>

</tr>

@foreach($guru as $g)

<tr>

<td width="80">

@if($g->foto)

<img src="{{ asset('storage/'.$g->foto) }}"
width="60">

@endif

</td>

<td>{{ $g->nama }}</td>

<td>{{ $g->jabatan }}</td>

<td>

@if($g->status)

<span class="badge bg-success">
Aktif
</span>

@else

<span class="badge bg-danger">
Nonaktif
</span>

@endif

</td>

<td width="170">

<a href="{{ route('guru.edit',$g) }}"
class="btn btn-warning btn-sm">

Edit

</a>

<form
action="{{ route('guru.destroy',$g) }}"
method="POST"
style="display:inline">

@csrf
@method('DELETE')

<button
class="btn btn-danger btn-sm">

Hapus

</button>

</form>

</td>

</tr>

@endforeach

</table>

@stop