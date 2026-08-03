@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard PMB</h1>
@stop

@section('content')

<div class="row">

    <div class="col-lg-3 col-6">

        <div class="small-box bg-info">

            <div class="inner">

                <h3>{{ $totalPendaftar }}</h3>

                <p>Total Pendaftar</p>

            </div>

            <div class="icon">

                <i class="fas fa-users"></i>

            </div>

        </div>

    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box bg-success">

            <div class="inner">

                <h3>{{ $diterima }}</h3>

                <p>Diterima</p>

            </div>

            <div class="icon">

                <i class="fas fa-check"></i>

            </div>

        </div>

    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box bg-warning">

            <div class="inner">

                <h3>{{ $menunggu }}</h3>

                <p>Menunggu</p>

            </div>

            <div class="icon">

                <i class="fas fa-clock"></i>

            </div>

        </div>

    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box bg-danger">

            <div class="inner">

                <h3>{{ $ditolak }}</h3>

                <p>Ditolak</p>

            </div>

            <div class="icon">

                <i class="fas fa-times"></i>

            </div>

        </div>

    </div>

</div>

<div class="row">

    <div class="col-md-8">

        <div class="card">

            <div class="card-header">

                <h3 class="card-title">

                    Grafik Pendaftar per Jurusan

                </h3>

            </div>

            <div class="card-body">

                <canvas id="jurusanChart"></canvas>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card">

            <div class="card-header">

                <h3 class="card-title">

                    Statistik

                </h3>

            </div>

            <div class="card-body">

                <table class="table">

                    <tr>

                        <th>Jurusan</th>

                        <td>{{ $totalJurusan }}</td>

                    </tr>

                    <tr>

                        <th>Gelombang</th>

                        <td>{{ $totalGelombang }}</td>

                    </tr>

                    <tr>

                        <th>Total Pendaftar</th>

                        <td>{{ $totalPendaftar }}</td>

                    </tr>

                </table>

            </div>

        </div>

        <div class="card">

            <div class="card-header">

                <h3 class="card-title">

                    5 Pendaftar Terbaru

                </h3>

            </div>

            <div class="card-body">

                <table class="table table-sm">

                    @forelse($pendaftarTerbaru as $p)

                    <tr>

                        <td>{{ $p->nama_lengkap }}</td>

                        <td>

                            @if($p->status=='diterima')

                                <span class="badge badge-success">

                                    Diterima

                                </span>

                            @elseif($p->status=='ditolak')

                                <span class="badge badge-danger">

                                    Ditolak

                                </span>

                            @else

                                <span class="badge badge-warning">

                                    Menunggu

                                </span>

                            @endif

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td>Belum ada data.</td>

                    </tr>

                    @endforelse

                </table>

            </div>

        </div>

    </div>

</div>

@stop

@section('js')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

new Chart(document.getElementById('jurusanChart'),{

type:'bar',

data:{

labels:@json($labels),

datasets:[{

label:'Jumlah Pendaftar',

data:@json($data),

backgroundColor:[
'#007bff',
'#28a745',
'#ffc107',
'#dc3545',
'#6f42c1',
'#20c997'
]

}]

},

options:{

responsive:true,

plugins:{

legend:{

display:false

}

}

}

});

</script>

@stop