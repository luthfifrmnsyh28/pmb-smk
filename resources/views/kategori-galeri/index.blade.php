@extends('adminlte::page')

@section('title', 'Kategori Galeri')

@section('content_header')
<h1>Kategori Galeri</h1>
@stop

@section('content')

<div class="card">

    <div class="card-header">

        <a href="{{ route('kategori-galeri.create') }}"
           class="btn btn-primary">

            <i class="fas fa-plus"></i>
            Tambah Kategori

        </a>

    </div>

    <div class="card-body">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">

            <thead>

                <tr>
                    <th width="60">No</th>
                    <th>Nama</th>
                    <th>Status</th>
                    <th>Urutan</th>
                    <th width="150">Aksi</th>
                </tr>

            </thead>

            <tbody>

                @forelse($kategori as $item)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $item->nama }}</td>

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

                    <td>{{ $item->urutan }}</td>

                    <td>

                        <a href="{{ route('kategori-galeri.edit',$item->id) }}"
                           class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <form action="{{ route('kategori-galeri.destroy',$item->id) }}"
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

                @empty

                <tr>

                    <td colspan="5" class="text-center">

                        Belum ada data

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@stop