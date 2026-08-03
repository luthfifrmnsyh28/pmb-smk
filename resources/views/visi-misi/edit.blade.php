@extends('adminlte::page')

@section('title', 'Visi Misi Sekolah')

@section('content_header')
<h1>Visi Misi Sekolah</h1>
@stop

@section('content')

<div class="card">

    <div class="card-header">
        <h3 class="card-title">Visi Misi Sekolah</h3>
    </div>

    <form action="{{ route('visi-misi.update',$visi_misi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="form-group">
                <label>Visi</label>
                <textarea name="visi" class="form-control" rows="4">{{ old('visi',$visi_misi->visi) }}</textarea>
            </div>

            <div class="form-group">
                <label>Misi</label>
                <textarea name="misi" class="form-control" rows="6">{{ old('misi',$visi_misi->misi) }}</textarea>
            </div>

            <div class="form-group">
                <label>Tujuan</label>
                <textarea name="tujuan" class="form-control" rows="5">{{ old('tujuan',$visi_misi->tujuan) }}</textarea>
            </div>

            <div class="form-group">
                <label>Motto</label>
                <input type="text"
                       name="motto"
                       class="form-control"
                       value="{{ old('motto',$visi_misi->motto) }}">
            </div>

            <div class="form-group">
                <label>Budaya Sekolah</label>
                <textarea name="budaya" class="form-control" rows="5">{{ old('budaya',$visi_misi->budaya) }}</textarea>
            </div>

        </div>

        <div class="card-footer">
            <button class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan
            </button>
        </div>

    </form>

</div>

@stop