@extends('adminlte::page')

@section('title', 'Edit Slider')

@section('content_header')
<h1>Edit Slider</h1>
@stop

@section('content')

<div class="card">

<form action="{{ route('slider.update',$slider) }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <div class="card-body">

        <div class="form-group">

            <label>Judul Slider</label>

            <input
                type="text"
                name="judul"
                class="form-control"
                value="{{ old('judul',$slider->judul) }}"
                required>

        </div>

        <div class="form-group">

            <label>Sub Judul</label>

            <textarea
                name="subjudul"
                class="form-control"
                rows="3">{{ old('subjudul',$slider->subjudul) }}</textarea>

        </div>

        <div class="form-group">

            <label>Gambar Baru</label>

            <input
                type="file"
                name="gambar"
                class="form-control">

        </div>

        <div class="mb-3">

            <img
                src="{{ asset('storage/'.$slider->gambar) }}"
                width="300"
                class="img-thumbnail">

        </div>

        <div class="form-group">

            <label>Urutan</label>

            <input
                type="number"
                name="urutan"
                class="form-control"
                value="{{ $slider->urutan }}">

        </div>

        <div class="form-group">

            <label>Status</label>

            <select
                name="aktif"
                class="form-control">

                <option
                    value="1"
                    {{ $slider->aktif ? 'selected' : '' }}>

                    Aktif

                </option>

                <option
                    value="0"
                    {{ !$slider->aktif ? 'selected' : '' }}>

                    Nonaktif

                </option>

            </select>

        </div>

    </div>

    <div class="card-footer">

        <button
            type="submit"
            class="btn btn-primary">

            Update

        </button>

        <a href="{{ route('slider.index') }}"
           class="btn btn-secondary">

            Kembali

        </a>

    </div>

</form>

</div>

@stop