@extends('adminlte::page')

@section('title', 'Gelombang Pendaftaran')

@section('content_header')
<h1>Gelombang Pendaftaran</h1>
@stop

@section('content')

<a href="{{ route('gelombang.create') }}"
   class="btn btn-primary mb-3">
    Tambah Gelombang
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
                    <th>Nama Gelombang</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Kuota</th>
                    <th>Status</th>
                    <th width="180">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($gelombangs as $g)
                <tr>
                    <td>{{ $g->nama_gelombang }}</td>
                    <td>{{ $g->tanggal_mulai }}</td>
                    <td>{{ $g->tanggal_selesai }}</td>
                    <td>{{ $g->kuota }}</td>

                    <td>
                        @if($g->status)
                            <span class="badge badge-success">
                                Aktif
                            </span>
                        @else
                            <span class="badge badge-secondary">
                                Nonaktif
                            </span>
                        @endif
                    </td>

                    <td>
                        <a href="{{ route('gelombang.edit',$g) }}"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('gelombang.destroy',$g) }}"
                              method="POST"
                              style="display:inline">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Hapus data?')">
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