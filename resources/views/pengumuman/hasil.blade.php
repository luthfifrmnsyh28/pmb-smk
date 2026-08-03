<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pengumuman SPMB</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f4f7fb;
        }

        .card-hasil{
            border:none;
            border-radius:20px;
            overflow:hidden;
            box-shadow:0 10px 30px rgba(0,0,0,.1);
        }

        .header-lulus{
            background:linear-gradient(135deg,#16a34a,#22c55e);
            color:#fff;
            padding:35px;
            text-align:center;
        }

        .header-menunggu{
            background:linear-gradient(135deg,#f59e0b,#fbbf24);
            color:#fff;
            padding:35px;
            text-align:center;
        }

        .header-gagal{
            background:linear-gradient(135deg,#dc3545,#ff6b6b);
            color:#fff;
            padding:35px;
            text-align:center;
        }

        .icon{
            font-size:70px;
            margin-bottom:10px;
        }

        .table td{
            padding:12px;
        }
    </style>

</head>
<body>

<div class="container py-5">

<div class="row justify-content-center">

<div class="col-lg-8">

@if($pendaftar)

<div class="card card-hasil">

{{-- HEADER --}}
@if($pendaftar->status == 'diterima')

<div class="header-lulus">
    <div class="icon">🎉</div>
    <h2>SELAMAT</h2>
    <h4>Anda Dinyatakan DITERIMA</h4>
</div>

@elseif($pendaftar->status == 'menunggu')

<div class="header-menunggu">
    <div class="icon">⏳</div>
    <h2>MOHON MENUNGGU</h2>
    <h4>Hasil Seleksi Belum Diumumkan</h4>
</div>

@else

<div class="header-gagal">
    <div class="icon">❌</div>
    <h2>MOHON MAAF</h2>
    <h4>Anda Belum Dinyatakan Lulus</h4>
</div>

@endif


<div class="card-body p-4">

<table class="table">

<tr>
    <td width="35%"><b>Nomor Pendaftaran</b></td>
    <td>{{ $pendaftar->nomor_pendaftaran }}</td>
</tr>

<tr>
    <td><b>Nama Lengkap</b></td>
    <td>{{ $pendaftar->nama_lengkap }}</td>
</tr>

<tr>
    <td><b>Jenis Kelamin</b></td>
    <td>{{ $pendaftar->jenis_kelamin }}</td>
</tr>

<tr>
    <td><b>Jurusan</b></td>
    <td>{{ $pendaftar->jurusan->nama_jurusan ?? '-' }}</td>
</tr>

<tr>
    <td><b>Status</b></td>
    <td>

@if($pendaftar->status == 'diterima')

<span class="badge bg-success fs-6">
    DITERIMA
</span>

@elseif($pendaftar->status == 'menunggu')

<span class="badge bg-warning text-dark fs-6">
    MENUNGGU
</span>

@else

<span class="badge bg-danger fs-6">
    TIDAK DITERIMA
</span>

@endif

</td>
</tr>

</table>

<div class="text-center mt-4">

<a href="{{ url('/pengumuman') }}" class="btn btn-primary">
    Cek Nomor Lain
</a>

</div>

</div>

</div>

@else

<div class="card shadow">

<div class="card-body text-center p-5">

<h2 class="text-danger">
Data Tidak Ditemukan
</h2>

<p>
Nomor pendaftaran yang Anda masukkan tidak terdaftar.
</p>

<a href="{{ url('/pengumuman') }}" class="btn btn-primary">
Kembali
</a>

</div>

</div>

@endif

</div>

</div>

</div>

</body>
</html>