<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">

    <title>Bukti Pendaftaran</title>

    <style>

        body{
            font-family: Arial, sans-serif;
            font-size:14px;
        }

        table{
            width:100%;
            border-collapse: collapse;
        }

        td{
            padding:5px;
        }

        .judul{
            text-align:center;
            margin-bottom:20px;
        }

        .border{
            border:1px solid #000;
        }

    </style>

</head>

<body>

<div class="judul">

    <h2>
        SMKS PGRI INDRAMAYU
    </h2>

    <h3>
        BUKTI PENDAFTARAN PMB
    </h3>

</div>

<hr>

<table>

    <tr>
        <td width="220">Nomor Pendaftaran</td>
        <td>: {{ $pendaftar->nomor_pendaftaran }}</td>
    </tr>

    <tr>
        <td>Nama Lengkap</td>
        <td>: {{ $pendaftar->nama_lengkap }}</td>
    </tr>

    <tr>
        <td>NISN</td>
        <td>: {{ $pendaftar->nisn }}</td>
    </tr>

    <tr>
        <td>Jurusan</td>
        <td>: {{ $pendaftar->jurusan->nama_jurusan }}</td>
    </tr>

    <tr>
        <td>Gelombang</td>
        <td>: {{ $pendaftar->gelombang->nama_gelombang }}</td>
    </tr>

    <tr>
        <td>Status</td>
        <td>: {{ strtoupper($pendaftar->status) }}</td>
    </tr>

</table>

<br><br><br>

<div style="text-align:right">

    Indramayu,
    {{ date('d-m-Y') }}

    <br><br><br><br>

    Panitia PMB

</div>

</body>
</html>