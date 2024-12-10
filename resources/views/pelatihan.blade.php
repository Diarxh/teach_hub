@extends('theme')
@section('content')
    <!-- Tambahkan di bagian atas setelah Header -->
    <div class="background-pattern"></div>
    <!-- Header Start -->
    <div class="py-5 container-fluid bg-breadcrumb">
        <ul class="breadcrumb-animation">
            @for ($i = 0; $i < 10; $i++)
                <li></li>
            @endfor
        </ul>
        <div class="container py-5 text-center">
            <h1 class="display-3 wow fadeInDown" data-wow-delay="0.1s">Pelatihan</h1>
            <p class="text-muted wow fadeInUp" data-wow-delay="0.2s">Temukan pelatihan yang sesuai dengan kebutuhan Anda</p>
        </div>
    </div>
    <!-- Header End -->

    <!-- Training List Start -->
    <div class="py-5 container-fluid">
        <div class="container py-5">
            <!-- Section Title -->
            <div class="mb-5 text-center section-title wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="mb-4 display-5">List Pelatihan</h2>
            </div>

            <!-- Search Form -->
            <div class="mb-5 search-wrapper wow fadeInUp" data-wow-delay="0.2s">
                <form class="d-flex justify-content-center">
                    <div class="input-group">
                        <input type="search" class="form-control search-input" placeholder="Cari pelatihan..."
                            aria-label="Search">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search me-1"></i> Cari
                        </button>
                    </div>
                </form>
            </div>

            <!-- Training Cards -->
            <div class="row g-4 justify-content-center">
                @forelse ($pelatihan as $data)
                    <div class="col-sm-6 col-lg-4 col-xl-3 justify-content-center wow fadeInUp" data-aos-delay="0.1s">
                        <div class="card training-card h-100">
                            <div class="card-img-wrapper">
                                @if ($data->photo)
                                    <img src="{{ asset('storage/' . $data->photo) }}" alt="{{ $data->name }}"
                                        class="card-img-top" loading="lazy">
                                @else
                                    <div class="placeholder-img">
                                        <i class="fas fa-chalkboard-teacher"></i>
                                    </div>
                                @endif
                                <div class="card-img-overlay">
                                    <span class="badge bg-primary">
                                        <i class="fas fa-users me-1"></i> 100 Peserta
                                    </span>
                                </div>
                            </div>

                            <div class="card-body d-flex flex-column">
                                <h5 class="mb-3 text-center card-title">{{ $data->name }}</h5>
                                <p class="card-text flex-grow-1">{!! Str::limit($data->description, 100) !!}</p>

                                <div class="mb-3 training-meta">
                                    <div class="d-flex justify-content-between text-muted">
                                        <span>
                                            <i class="fa fa-calendar-alt me-1"></i>
                                            {{ \Carbon\Carbon::parse($data->start_date)->translatedFormat('d M Y') }} -
                                            {{ \Carbon\Carbon::parse($data->end_date)->translatedFormat('d M Y') }}
                                            <!-- Menampilkan tanggal akhir -->
                                        </span>
                                        {{--  <span>
                                            <i class="fa fa-clock me-1"></i>
                                            {{ \Carbon\Carbon::parse($data->start_date)->format('H:i') }} -
                                            {{ \Carbon\Carbon::parse($data->end_date)->format('H:i') }}
                                            <!-- Menampilkan waktu akhir -->
                                        </span>  --}}
                                        <span>
                                            <i class="fa fa-map-marker-alt me-1"></i>
                                            {{ $data->training_location }} <!-- Menampilkan lokasi pelatihan -->
                                        </span>
                                    </div>
                                    {{--  <div class="text-muted">
                                        <span>
                                            <i class="fa fa-map-marker-alt me-1"></i>
                                            {{ $data->training_location }} <!-- Menampilkan lokasi pelatihan -->
                                        </span>
                                    </div>
                                </div>  --}}

                                    <a href="/detail_pelatihan/{{ $data->id }}"
                                        class="mt-auto btn btn-primary rounded-pill">
                                        <i class="fas fa-arrow-right me-1"></i> Detail Pelatihan
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center col-12">
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle me-2"></i>Belum ada pelatihan yang tersedia.
                            </div>
                        </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-5 d-flex justify-content-center wow fadeInUp" data-wow-delay="0.3s">
                {{ $pelatihan->onEachSide(1)->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
    <!-- Training List End -->
@endsection
