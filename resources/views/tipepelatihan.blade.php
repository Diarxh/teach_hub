@extends('theme')
@section('content')
    <!-- Tambahkan di bagian atas setelah Header -->
    <div class="background-pattern"></div>
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <ul class="breadcrumb-animation">
            @for ($i = 0; $i < 10; $i++)
                <li></li>
            @endfor
        </ul>
        <div class="container py-5 text-center">
            <h1 class="display-3 wow fadeInDown" data-wow-delay="0.1s">Tipe Pelatihan</h1>
        </div>
    </div>
    <!-- Header End -->

    <!-- Service Start -->
    <div class="py-5 container-fluid bg-light" data-aos="fade-up" data-aos-delay="300">
        <div class="container py-5">
            <div class="mb-5 section-title wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="mb-4 display-5">Berikut List Tipe Pelatihan</h2>
            </div>

            <div class="row g-4 justify-content-center">
                @forelse ($tipepelatihan as $data)
                    <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="card blog-item h-100 shadow-effect">
                            <div class="overflow-hidden card-img-top blog-img position-relative">
                                @if ($data->photo)
                                    <img src="{{ asset('storage/' . $data->photo) }}" alt="{{ $data->trainer_type_name }}"
                                        class="img-fluid slightly-rounded-image w-100"
                                        style="height: 200px; object-fit: cover;">
                                @else
                                    <div class="d-flex justify-content-center align-items-center bg-light"
                                        style="height: 200px;">
                                        <i class="fas fa-chalkboard-teacher fa-4x text-secondary"></i>
                                    </div>
                                @endif
                            </div>

                            <div class="card-body d-flex flex-column">
                                <h3 class="mb-3 text-center card-title h5">{{ $data->trainer_type_name }}</h3>
                                <p class="card-text flex-grow-1">
                                    {!! Str::limit($data->trainer_type_description, 100) !!}
                                </p>
                                <div class="mt-3 text-center">
                                    <a href="/detail_pelatihan/{{ $data->id }}"
                                        class="px-4 py-2 btn btn-primary rounded-pill shadow-btn">
                                        <i class="fas fa-arrow-right me-2"></i>Lihat Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center col-12">
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle me-2"></i>Belum ada tipe pelatihan yang tersedia.
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    <!-- Service End -->

    <style>
        .slightly-rounded-image {
            border-radius: 10px 10px 0 0;
        }

        .shadow-effect {
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: none;
            background: white;
        }

        .shadow-effect:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .shadow-btn {
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .shadow-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .card-title {
            font-weight: 600;
            color: #333;
        }

        .card-text {
            color: #666;
            line-height: 1.6;
        }

        .section-title {
            position: relative;
            padding-bottom: 15px;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 2px;
            background: #0d6efd;
        }
    </style>
@endsection
