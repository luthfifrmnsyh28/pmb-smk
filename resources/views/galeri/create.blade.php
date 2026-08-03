@extends('adminlte::page')

@section('title','Tambah Galeri')

@section('content_header')
<h1>Tambah Galeri</h1>
@stop

@section('content')

<div class="card">

    <form action="{{ route('galeri.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="card-body">

            <div class="form-group">
                <label>Kategori</label>

                <select name="kategori_galeri_id"
                        class="form-control"
                        required>

                    <option value="">
                        -- Pilih Kategori --
                    </option>

                    @foreach($kategori as $item)

                    <option value="{{ $item->id }}">
                        {{ $item->nama }}
                    </option>

                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <label>Judul Foto</label>

                <input type="text"
                       name="judul"
                       class="form-control"
                       required>
            </div>

            <div class="form-group">
                <label>Foto</label>

                <input type="file"
                       name="foto"
                       class="form-control"
                       required>
            </div>

            <div class="form-group">
                <label>Deskripsi</label>

                <textarea name="deskripsi"
                          rows="4"
                          class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label>Status</label>

                <select name="status"
                        class="form-control">

                    <option value="1">Aktif</option>
                    <option value="0">Nonaktif</option>

                </select>
            </div>

            <div class="form-group">
                <label>Urutan</label>

                <input type="number"
                       name="urutan"
                       value="1"
                       class="form-control">
            </div>

        </div>

        <div class="card-footer">

            <button class="btn btn-primary">

                <i class="fas fa-save"></i>
                Simpan

            </button>

        </div>

    </form>

</div>

@stop