@extends('adminlte::page')

@section('title','Edit Galeri')

@section('content_header')
<h1>Edit Galeri</h1>
@stop

@section('content')

<div class="card">

<form action="{{ route('galeri.update',$galeri->id) }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <div class="card-body">

        <div class="form-group">

            <label>Kategori</label>

            <select name="kategori_galeri_id"
                    class="form-control">

                @foreach($kategori as $item)

                <option value="{{ $item->id }}"
                    {{ $galeri->kategori_galeri_id==$item->id ? 'selected':'' }}>

                    {{ $item->nama }}

                </option>

                @endforeach

            </select>

        </div>

        <div class="form-group">

            <label>Judul</label>

            <input type="text"
                   name="judul"
                   value="{{ $galeri->judul }}"
                   class="form-control">

        </div>

        <div class="form-group">

            <label>Foto Saat Ini</label>

            <br>

            <img src="{{ asset('storage/'.$galeri->foto) }}"
                 width="200">

        </div>

        <div class="form-group">

            <label>Ganti Foto</label>

            <input type="file"
                   name="foto"
                   class="form-control">

        </div>

        <div class="form-group">

            <label>Deskripsi</label>

            <textarea name="deskripsi"
                      rows="4"
                      class="form-control">{{ $galeri->deskripsi }}</textarea>

        </div>

        <div class="form-group">

            <label>Status</label>

            <select name="status"
                    class="form-control">

                <option value="1"
                    {{ $galeri->status ? 'selected':'' }}>
                    Aktif
                </option>

                <option value="0"
                    {{ !$galeri->status ? 'selected':'' }}>
                    Nonaktif
                </option>

            </select>

        </div>

    </div>

    <div class="card-footer">

        <button class="btn btn-primary">

            Update

        </button>

    </div>

</form>

</div>

@stop