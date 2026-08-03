@extends('adminlte::page')

@section('title', 'Tambah Slider')

@section('content_header')
<h1>Tambah Slider</h1>
@stop

@section('content')

<div class="card">

    <form action="{{ route('slider.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="card-body">

            @if($errors->any())

            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

            @endif

            <div class="form-group">

                <label>Judul Slider</label>

                <input
                    type="text"
                    name="judul"
                    class="form-control"
                    value="{{ old('judul') }}"
                    required>

            </div>

            <div class="form-group">

                <label>Sub Judul</label>

                <textarea
                    name="subjudul"
                    class="form-control"
                    rows="3">{{ old('subjudul') }}</textarea>

            </div>

            <div class="form-group">

                <label>Gambar Slider</label>

                <input
                    type="file"
                    name="gambar"
                    class="form-control"
                    accept="image/*"
                    onchange="previewImage(event)"
                    required>

            </div>

            <div class="mb-3">

                <img
                    id="preview"
                    src=""
                    style="max-width:300px; display:none;"
                    class="img-thumbnail">

            </div>

            <div class="form-group">

                <label>Urutan</label>

                <input
                    type="number"
                    name="urutan"
                    class="form-control"
                    value="0">

            </div>

            <div class="form-group">

                <label>Status</label>

                <select
                    name="aktif"
                    class="form-control">

                    <option value="1">
                        Aktif
                    </option>

                    <option value="0">
                        Nonaktif
                    </option>

                </select>

            </div>

        </div>

        <div class="card-footer">

            <button
                type="submit"
                class="btn btn-primary">

                <i class="fas fa-save"></i>
                Simpan

            </button>

            <a href="{{ route('slider.index') }}"
               class="btn btn-secondary">

                Kembali

            </a>

        </div>

    </form>

</div>

@stop

@section('js')

<script>

function previewImage(event)
{
    let preview =
        document.getElementById('preview');

    preview.src =
        URL.createObjectURL(
            event.target.files[0]
        );

    preview.style.display =
        'block';
}

</script>

@stop