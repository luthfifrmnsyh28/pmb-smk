@extends('adminlte::page')

@section('title','Tambah Kategori')

@section('content')

<div class="card">

    <div class="card-header">

        Tambah Kategori Galeri

    </div>

    <form action="{{ route('kategori-galeri.store') }}"
          method="POST">

        @csrf

        <div class="card-body">

            <div class="form-group">

                <label>Nama Kategori</label>

                <input type="text"
                       name="nama"
                       class="form-control"
                       required>

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

                Simpan

            </button>

        </div>

    </form>

</div>

@stop