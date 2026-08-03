@extends('adminlte::page')

@section('title', 'Slider Hero')

@section('content_header')
<h1>Slider Hero</h1>
@stop

@section('content')

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<a href="{{ route('slider.create') }}"
   class="btn btn-primary mb-3">

    <i class="fas fa-plus"></i>
    Tambah Slider

</a>

<div class="card">

    <div class="card-body">

        <table class="table table-bordered table-striped">

            <thead>

                <tr>

                    <th width="180">Gambar</th>
                    <th>Judul</th>
                    <th>Status</th>
                    <th>Urutan</th>
                    <th width="180">Aksi</th>

                </tr>

            </thead>

            <tbody>

                @forelse($sliders as $slider)

                <tr>

                    <td>

                        <img
                            src="{{ asset('storage/'.$slider->gambar) }}"
                            width="150"
                            class="img-thumbnail">

                    </td>

                    <td>

                        <strong>
                            {{ $slider->judul }}
                        </strong>

                        <br>

                        <small>
                            {{ $slider->subjudul }}
                        </small>

                    </td>

                    <td>

                        @if($slider->aktif)

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

                        {{ $slider->urutan }}

                    </td>

                    <td>

                        <a href="{{ route('slider.edit',$slider) }}"
                           class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <form
                            action="{{ route('slider.destroy',$slider) }}"
                            method="POST"
                            style="display:inline">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Hapus slider?')">

                                Hapus

                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="5"
                        class="text-center">

                        Belum ada slider

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@stop