@extends('adminlte::page')

@section('title','Berita')

@section('content')

<div class="card">

    <div class="card-header">

        <a href="{{ route('admin-berita.create') }}"
   class="btn btn-primary">
    Tambah Berita
</a>

    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <thead>

            <tr>
                <th>ID</th>
                <th>Thumbnail</th>
                <th>Judul</th>
                <th>Status</th>
                <th width="150">Aksi</th>
            </tr>

            </thead>

            <tbody>

            @foreach($berita as $item)

            <tr>

                <td>{{ $item->id }}</td>

                <td width="120">

                    @if($item->thumbnail)

                        <img src="{{ asset('storage/'.$item->thumbnail) }}"
                             width="100">

                    @endif

                </td>

                <td>{{ $item->judul }}</td>

                <td>
                    {!! $item->status
                    ? '<span class="badge badge-success">Publish</span>'
                    : '<span class="badge badge-danger">Draft</span>' !!}
                </td>

                <td>

                    <a href="{{ route('admin-berita.edit',$item->id) }}"
                       class="btn btn-warning btn-sm">

                        Edit

                    </a>

                </td>

            </tr>

            @endforeach

            </tbody>

        </table>

    </div>

</div>

@stop