@extends('adminlte::page')

@section('title','Edit Kategori')

@section('content')

<div class="card">

    <div class="card-header">

        Edit Kategori Galeri

    </div>

    <form action="{{ route('kategori-galeri.update',$kategori_galeri->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="card-body">

            <div class="form-group">

                <label>Nama Kategori</label>

                <input type="text"
                       name="nama"
                       value="{{ $kategori_galeri->nama }}"
                       class="form-control">

            </div>

            <div class="form-group">

                <label>Status</label>

                <select name="status"
                        class="form-control">

                    <option value="1"
                        {{ $kategori_galeri->status ? 'selected' : '' }}>
                        Aktif
                    </option>

                    <option value="0"
                        {{ !$kategori_galeri->status ? 'selected' : '' }}>
                        Nonaktif
                    </option>

                </select>

            </div>

            <div class="form-group">

                <label>Urutan</label>

                <input type="number"
                       name="urutan"
                       value="{{ $kategori_galeri->urutan }}"
                       class="form-control">

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