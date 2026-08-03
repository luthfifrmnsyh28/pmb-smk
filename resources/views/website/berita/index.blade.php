@extends('layouts.home')

@section('content')

<section class="py-5">
    <div class="container">

        <div class="text-center mb-5">

            <h2 class="fw-bold">
                Berita Sekolah
            </h2>

            <p class="text-muted">
                Informasi dan kegiatan terbaru SMKS PGRI Indramayu
            </p>

        </div>

        <div class="row">

            @forelse($beritas as $item)

                <div class="col-md-4 mb-4">

                    <div class="card h-100 shadow-sm">

                        <img
                            src="{{ asset('storage/'.$item->thumbnail) }}"
                            class="card-img-top"
                            style="height:220px;object-fit:cover;">

                        <div class="card-body">

                            <h5>
                                {{ $item->judul }}
                            </h5>

                            <p class="text-muted small">
                                {{ $item->created_at->format('d M Y') }}
                            </p>

                            <a href="{{ route('website.berita.show',$item->slug) }}"
                               class="btn btn-primary btn-sm">

                                Baca Selengkapnya

                            </a>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12">

                    <div class="alert alert-warning">

                        Belum ada berita dipublikasikan.

                    </div>

                </div>

            @endforelse

        </div>

        <div class="mt-4">
            {{ $beritas->links() }}
        </div>

    </div>
</section>

@endsection