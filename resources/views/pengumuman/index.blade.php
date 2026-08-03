<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pengumuman Hasil SPMB</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <style>
        body{
            background:#f5f7fb;
        }

        .hero{
            background:linear-gradient(135deg,#0d6efd,#0056d6);
            color:white;
            padding:70px 0;
            text-align:center;
        }

        .card-pengumuman{
            margin-top:-50px;
            border:none;
            border-radius:20px;
            box-shadow:0 10px 35px rgba(0,0,0,.12);
        }

        .form-control{
            height:55px;
            border-radius:12px;
        }

        .btn-primary{
            height:55px;
            border-radius:12px;
            font-weight:600;
        }

        .icon-circle{
            width:90px;
            height:90px;
            border-radius:50%;
            background:#eaf3ff;
            display:flex;
            align-items:center;
            justify-content:center;
            margin:auto;
            margin-top:-70px;
            margin-bottom:20px;
        }

        .icon-circle i{
            font-size:40px;
            color:#0d6efd;
        }
    </style>

</head>

<body>

    <section class="hero">

        <div class="container">

            <h1 class="fw-bold">
                Pengumuman Hasil SPMB
            </h1>

            <p class="mt-3">
                SMKS PGRI Indramayu Tahun Ajaran 2026/2027
            </p>

        </div>

    </section>

    <div class="container mb-5">

        <div class="row justify-content-center">

            <div class="col-lg-6">

                <div class="card card-pengumuman">

                    <div class="card-body p-5">

                        <div class="icon-circle">
                            <i class="fas fa-user-graduate"></i>
                        </div>

                        <h3 class="text-center fw-bold mb-3">
                            Cek Kelulusan
                        </h3>

                        <p class="text-center text-muted mb-4">
                            Masukkan Nomor Pendaftaran untuk melihat hasil seleksi.
                        </p>

                        <form method="POST" action="{{ route('pengumuman.cek') }}">

                            @csrf

                            <div class="mb-3">

                                <label class="form-label">
                                    Nomor Pendaftaran
                                </label>

                                <input type="text"
                                    name="nomor_pendaftaran"
                                    class="form-control"
                                    placeholder="Contoh : PMB20260001"
                                    required>

                            </div>

                            <button class="btn btn-primary w-100">

                                <i class="fas fa-search me-2"></i>

                                Cek Pengumuman

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>