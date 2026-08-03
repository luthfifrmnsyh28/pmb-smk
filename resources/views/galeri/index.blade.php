@extends('adminlte::page')

@section('title','Galeri')

@section('content_header')
<h1>Manajemen Galeri Sekolah</h1>
@stop

@section('content')

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="card">

    <div class="card-header">

        <a href="{{ route('galeri.create') }}"
           class="btn btn-primary">

            <i class="fas fa-plus"></i>
            Tambah Galeri

        </a>

    </div>

    <div class="card-body table-responsive">

        <table class="table table-bordered table-hover">

            <thead class="thead-dark">

                <tr>

                    <th width="50">No</th>
                    <th width="120">Foto</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Urutan</th>
                    <th width="180">Aksi</th>

                </tr>

            </thead>

            <tbody>

                @forelse($galeri as $item)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>

                        @if($item->foto)

                        <img
                            src="{{ asset('storage/'.$item->foto) }}"
                            width="100"
                            class="img-thumbnail">

                        @endif

                    </td>

                    <td>

                        <strong>
                            {{ $item->judul }}
                        </strong>

                        <br>

                        <small class="text-muted">
                            {{ $item->deskripsi }}
                        </small>

                    </td>

                    <td>

                        {{ $item->kategori->nama ?? '-' }}

                    </td>

                    <td>

                        @if($item->status)

                        <span class="badge badge-success">
                            Aktif
                        </span>

                        @else

                        <span class="badge badge-danger">
                            Nonaktif
                        </span>

                        @endif

                    </td>

                    <td>

                        {{ $item->urutan }}

                    </td>

                    <td>

                        <a href="{{ route('galeri.edit',$item->id) }}"
                           class="btn btn-warning btn-sm">

                            <i class="fas fa-edit"></i>

                        </a>

                        <form
                            action="{{ route('galeri.destroy',$item->id) }}"
                            method="POST"
                            style="display:inline">

                            @csrf
                            @method('DELETE')

                            <button
                                onclick="return confirm('Hapus data?')"
                                class="btn btn-danger btn-sm">

                                <i class="fas fa-trash"></i>

                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="7"
                        class="text-center">

                        Belum ada data galeri

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@stop

@section('js')

<script>

$(function () {

    $('.table').DataTable();

});

</script>

@stop