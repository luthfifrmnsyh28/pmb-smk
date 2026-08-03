<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<style>

body{

font-family:Arial;

}

.card{

border:3px solid #000;

padding:20px;

}

table{

width:100%;

}

.title{

text-align:center;

font-size:22px;

font-weight:bold;

margin-bottom:20px;

}

.logo{

width:80px;

}

.photo{

width:120px;

height:150px;

border:1px solid #000;

object-fit:cover;

}

</style>

</head>

<body>

<div class="card">

<table>

<tr>

<td width="100">

<img src="{{ public_path('logopgri.jpeg') }}" class="logo">

</td>

<td align="center">

<h2>

SMKS PGRI INDRAMAYU

</h2>

<h3>

KARTU PESERTA PMB

</h3>

</td>

</tr>

</table>

<hr>

<table>

<tr>

<td width="70%">

<table>

<tr>

<td width="180">

Nomor Pendaftaran

</td>

<td>

:

{{ $pendaftar->nomor_pendaftaran }}

</td>

</tr>

<tr>

<td>

Nama

</td>

<td>

:

{{ $pendaftar->nama_lengkap }}

</td>

</tr>

<tr>

<td>

NISN

</td>

<td>

:

{{ $pendaftar->nisn }}

</td>

</tr>

<tr>

<td>

Jurusan

</td>

<td>

:

{{ $pendaftar->jurusan->nama_jurusan }}

</td>

</tr>

<tr>

<td>

Gelombang

</td>

<td>

:

{{ $pendaftar->gelombang->nama_gelombang }}

</td>

</tr>

</table>

</td>

<td align="center">

@if($pendaftar->foto)

<img src="{{ public_path('storage/'.$pendaftar->foto) }}"
class="photo">

@else

<div class="photo">

Foto

</div>

@endif

</td>

</tr>

</table>

<br><br>

<table>

<tr>

<td width="60%"></td>

<td align="center">

Indramayu,

{{ date('d F Y') }}

<br><br><br><br>

____________________

</td>

</tr>

</table>

</div>

</body>

</html>