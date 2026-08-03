@extends('adminlte::page')

@section('title', 'Data Jurusan')

@section('content_header')
<h1>Data Jurusan</h1>
@stop

@section('content')

<a href="{{ route('jurusan.create') }}" class="btn btn-primary mb-3">
    Tambah Jurusan
</a>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="card">
    <div class="card-body">

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Jurusan</th>
                    <th>Kuota</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jurusans as $jurusan)
                <tr>
                    <td>{{ $jurusan->kode_jurusan }}</td>
                    <td>{{ $jurusan->nama_jurusan }}</td>
                    <td>{{ $jurusan->kuota }}</td>
                    <td>
                        <a href="{{ route('jurusan.edit', $jurusan) }}"
                           class="btn btn-warning btn-sm">
                           Edit
                        </a>

                        <form action="{{ route('jurusan.destroy', $jurusan) }}"
                              method="POST"
                              style="display:inline">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm">
                                Hapus
                            </button>

                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

@stop