@extends('adminlte::page')

@section('title', 'Pendaftaran PMB')

@section('content_header')
    <h1>Pendaftaran Peserta Didik Baru</h1>
@stop

@section('content')

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

@if($pendaftar)

<div class="card">
    <div class="card-header bg-success">
        <h3 class="card-title">
            Data Pendaftaran Anda
        </h3>
    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <tr>
                <th width="250">Nomor Pendaftaran</th>
                <td>{{ $pendaftar->nomor_pendaftaran }}</td>
            </tr>

            <tr>
                <th>Nama Lengkap</th>
                <td>{{ $pendaftar->nama_lengkap }}</td>
            </tr>

            <tr>
                <th>Jurusan</th>
                <td>{{ $pendaftar->jurusan->nama_jurusan }}</td>
            </tr>

            <tr>
                <th>Status</th>
                <td>

                    @if($pendaftar->status == 'menunggu')
                        <span class="badge badge-warning">
                            MENUNGGU
                        </span>
                    @elseif($pendaftar->status == 'diterima')
                        <span class="badge badge-success">
                            DITERIMA
                        </span>
                    @else
                        <span class="badge badge-danger">
                            DITOLAK
                        </span>
                    @endif

                </td>
            </tr>

        </table>

    </div>
</div>

@else

<div class="card">

    <div class="card-header">
        <h3 class="card-title">
            Formulir Pendaftaran
        </h3>
    </div>

    <div class="card-body">

        <form method="POST"
      action="{{ route('pendaftaran.store') }}"
      enctype="multipart/form-data">
            @csrf

            <div class="row">

                <div class="col-md-6">
                    <label>Nama Lengkap</label>
                    <input type="text"
                           name="nama_lengkap"
                           class="form-control"
                           required>
                </div>

                <div class="col-md-6">
                    <label>NISN</label>
                    <input type="text"
                           name="nisn"
                           class="form-control">
                </div>

            </div>

            <br>

            <div class="row">

                <div class="col-md-6">
                    <label>NIK</label>
                    <input type="text"
                           name="nik"
                           class="form-control">
                </div>

                <div class="col-md-6">
                    <label>Jenis Kelamin</label>

                    <select name="jenis_kelamin"
                            class="form-control"
                            required>

                        <option value="">
                            Pilih Jenis Kelamin
                        </option>

                        <option value="Laki-laki">
                            Laki-laki
                        </option>

                        <option value="Perempuan">
                            Perempuan
                        </option>

                    </select>
                </div>

            </div>

            <br>

            <div class="row">

                <div class="col-md-6">
                    <label>Tempat Lahir</label>
                    <input type="text"
                           name="tempat_lahir"
                           class="form-control">
                </div>

                <div class="col-md-6">
                    <label>Tanggal Lahir</label>
                    <input type="date"
                           name="tanggal_lahir"
                           class="form-control">
                </div>

            </div>

            <br>

            <div class="form-group">
                <label>Alamat</label>

                <textarea name="alamat"
                          rows="3"
                          class="form-control"></textarea>
            </div>

            <div class="row">

                <div class="col-md-6">
                    <label>Asal Sekolah</label>

                    <input type="text"
                           name="asal_sekolah"
                           class="form-control">
                </div>

                <div class="col-md-6">
                    <label>No HP</label>

                    <input type="text"
                           name="no_hp"
                           class="form-control">
                </div>

            </div>

            <br>

            <div class="row">

                <div class="col-md-6">
                    <label>Nama Ayah</label>

                    <input type="text"
                           name="nama_ayah"
                           class="form-control">
                </div>

                <div class="col-md-6">
                    <label>Nama Ibu</label>

                    <input type="text"
                           name="nama_ibu"
                           class="form-control">
                </div>

            </div>

            <br>

            <div class="form-group">

                <label>Pilih Jurusan</label>

                <select name="jurusan_id"
                        class="form-control"
                        required>

                    <option value="">
                        Pilih Jurusan
                    </option>

                    @foreach($jurusans as $jurusan)

                    <option value="{{ $jurusan->id }}">
                        {{ $jurusan->kode_jurusan }}
                        -
                        {{ $jurusan->nama_jurusan }}
                    </option>

                    @endforeach

                </select>

            </div>

            <hr>

<h4>Upload Berkas</h4>

<div class="form-group">
    <label>Foto</label>
    <input type="file"
           name="foto"
           class="form-control">
</div>

<div class="form-group">
    <label>Kartu Keluarga (KK)</label>
    <input type="file"
           name="kk"
           class="form-control">
</div>

<div class="form-group">
    <label>Akta Kelahiran</label>
    <input type="file"
           name="akta"
           class="form-control">
</div>

<div class="form-group">
    <label>Ijazah / SKL</label>
    <input type="file"
           name="ijazah"
           class="form-control">
</div>

            </div>

            <br>
            
<hr>


            <button type="submit"
                    class="btn btn-primary">

                <i class="fas fa-save"></i>
                Simpan Pendaftaran

            </button>

        </form>

    </div>

</div>

@endif

@stop