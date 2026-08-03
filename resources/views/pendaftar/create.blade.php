@extends('adminlte::page')

@section('title', 'Tambah Pendaftar')

@section('content_header')
<h1>Form Pendaftaran Siswa Baru</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('pendaftar.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="row">

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label>Jurusan</label>
                        <select name="jurusan_id" class="form-control" required>
                            <option value="">Pilih Jurusan</option>
                            @foreach($jurusans as $jurusan)
                                <option value="{{ $jurusan->id }}">
                                    {{ $jurusan->nama_jurusan }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label>Gelombang</label>
                        <select name="gelombang_id" class="form-control" required>
                            <option value="">Pilih Gelombang</option>
                            @foreach($gelombangs as $gelombang)
                                <option value="{{ $gelombang->id }}">
                                    {{ $gelombang->nama_gelombang }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>

            <hr>

            <h5>Biodata Siswa</h5>

            <div class="row">

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label>NISN</label>
                        <input type="text"
                               name="nisn"
                               class="form-control"
                               required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label>NIK</label>
                        <input type="text"
                               name="nik"
                               class="form-control"
                               required>
                    </div>
                </div>

            </div>

            <div class="form-group mb-3">
                <label>Nama Lengkap</label>
                <input type="text"
                       name="nama_lengkap"
                       class="form-control"
                       required>
            </div>

            <div class="form-group mb-3">
                <label>Jenis Kelamin</label>

                <select name="jenis_kelamin"
                        class="form-control">

                    <option value="Laki-laki">
                        Laki-laki
                    </option>

                    <option value="Perempuan">
                        Perempuan
                    </option>

                </select>
            </div>

            <div class="row">

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label>Tempat Lahir</label>
                        <input type="text"
                               name="tempat_lahir"
                               class="form-control">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label>Tanggal Lahir</label>
                        <input type="date"
                               name="tanggal_lahir"
                               class="form-control">
                    </div>
                </div>

            </div>

            <div class="form-group mb-3">
                <label>Alamat</label>
                <textarea name="alamat"
                          class="form-control"
                          rows="3"></textarea>
            </div>

            <div class="row">

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label>Asal Sekolah</label>
                        <input type="text"
                               name="asal_sekolah"
                               class="form-control">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label>No HP</label>
                        <input type="text"
                               name="no_hp"
                               class="form-control">
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label>Nama Ayah</label>
                        <input type="text"
                               name="nama_ayah"
                               class="form-control">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label>Nama Ibu</label>
                        <input type="text"
                               name="nama_ibu"
                               class="form-control">
                    </div>
                </div>

            </div>

            <hr>

            <h5>Upload Berkas</h5>

            <div class="form-group mb-3">
                <label>Pas Foto</label>
                <input type="file"
                       name="foto"
                       class="form-control">
            </div>

            <div class="form-group mb-3">
                <label>Ijazah/SKL</label>
                <input type="file"
                       name="ijazah"
                       class="form-control">
            </div>

            <div class="form-group mb-3">
                <label>Kartu Keluarga</label>
                <input type="file"
                       name="kk"
                       class="form-control">
            </div>

            <div class="form-group mb-3">
                <label>Akta Kelahiran</label>
                <input type="file"
                       name="akta"
                       class="form-control">
            </div>

            <button class="btn btn-success">
                Simpan Pendaftaran
            </button>

            <a href="{{ route('pendaftar.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>
</div>

@stop