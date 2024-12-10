@extends('user.theme')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb py-2">
        <ul class="breadcrumb-animation">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
        <div class="container py-6 mt-5 text-center" style="max-width: 1000px;">
            <h3 class="display-3 wow fadeInDown mb-4" data-wow-delay="0.1s"
                style="background: linear-gradient(45deg, #007bff, #00ff88);
                       -webkit-background-clip: text;
                       -webkit-text-fill-color: transparent;">
                Dashboard
            </h3>
        </div>
    </div>
    <!-- Header End -->

    @if (!isset($guru))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    title: 'Data Guru Kosong',
                    text: 'Silakan lengkapi data guru Anda untuk melanjutkan.',
                    icon: 'warning',
                    confirmButtonText: 'Isi Data Guru',
                    allowOutsideClick: false,
                    allowEscapeKey: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('profile.show') }}#profile-edit";
                    }
                });

                if (window.location.hash === "#profile-edit") {
                    let tab = new bootstrap.Tab(document.querySelector('button[data-bs-target="#profile-edit"]'));
                    tab.show();
                }
            });
        </script>
    @endif

    <!-- Dashboard Content Start -->
    <div class="container my-5">
        <!-- Section Overview -->
        <div class="section-header py-4 bg-light">
            <h2 class="text-center">Overview</h2>
        </div>

        <div class="row">
            <!-- Card Total Pelatihan -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm" style="background: #e9f7fe;">
                    <div class="card-body text-center">
                        <i class="fas fa-book-open fa-3x text-primary mb-3"></i>
                        <h5 class="card-title mb-3">Total Pelatihan</h5>
                        <p class="card-text fs-4 fw-bold">{{ $totalPelatihan }}</p>
                    </div>
                </div>
            </div>

            <!-- Card Pelatihan Saya -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm" style="background: #d0e9ff;">
                    <div class="card-body text-center">
                        <i class="fas fa-user-graduate fa-3x text-success mb-3"></i>
                        <h5 class="card-title mb-3">Pelatihan Saya</h5>
                        <p class="card-text fs-4 fw-bold">{{ $pelatihanSaya }}</p>
                    </div>
                </div>
            </div>

            <!-- Card Pengguna Aktif dengan Avatar -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm" style="background: #f1f8ff;">
                    <div class="card-body text-center">
                        <img src="https://www.gravatar.com/avatar/{{ md5(Auth::user()->email) }}" class="rounded-circle"
                            width="50" height="50" alt="Avatar">
                        <h5 class="card-title mb-3">Pengguna Aktif</h5>
                        <p class="card-text fs-4 fw-bold">{{ $penggunaAktif }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pelatihan Terbaru Saya -->
        <div class="section-header py-4" style="background: #ffebcd;">
            <h2 class="text-center mb-4">List Pelatihan Terbaru</h2>
        </div>

        @if ($recentPelatihan->isNotEmpty())
            <div class="row justify-content-center">
                @foreach ($recentPelatihan as $item)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card shadow-sm border-light">
                            <!-- Gambar Pelatihan -->
                            @if ($item->Training && $item->Training->photo)
                                <img src="{{ asset('storage/' . $item->Training->photo) }}"
                                    alt="{{ $item->Training->name }}" class="card-img-top" loading="lazy"
                                    style="object-fit: cover; width: 100%; height: 200px;">
                            @else
                                <div class="placeholder-img">
                                    <i class="fas fa-chalkboard-teacher"></i>
                                </div>
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->Training->name }}</h5>
                                <p class="card-text"><strong>Tanggal:</strong> {{ $item->Training->start_date }} -
                                    {{ $item->Training->end_date }}</p>
                                <p class="card-text"><strong>Lokasi:</strong> {{ $item->Training->training_location }}
                                </p>
                                <a href="/detail_pelatihan/{{ $item->Training->id }}" class="btn btn-primary">Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-warning" role="alert">
                Anda belum mengikuti pelatihan apapun.
            </div>
        @endif

        <!-- Statistik Pelatihan (Chart.js) -->
        <div class="section-header py-4" style="background: #f5f5dc;">
            <h3 class="text-center mb-4">Statistik Pelatihan per Bulan</h3>
        </div>
        <div class="container my-5">
            <canvas id="monthlyTrainingChart" width="400" height="200"></canvas>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            var ctx = document.getElementById('monthlyTrainingChart').getContext('2d');
            var monthlyChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($labels) !!},
                    datasets: [{
                        label: 'Jumlah Pelatihan',
                        data: {!! json_encode($data) !!},
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 2,
                        fill: false
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Jumlah Pelatihan'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Bulan dan Tahun'
                            }
                        }
                    }
                }
            });
        </script>
        <style>
            /* Untuk memastikan card memiliki ukuran yang konsisten */
            .card-img-top {
                object-fit: cover;
                height: 200px;
                width: 100%;
            }

            /* Placeholder untuk gambar jika tidak ada */
            .placeholder-img {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 200px;
                background-color: #f1f1f1;
                color: #ccc;
            }

            /* Efek Hover pada Card */
            .card:hover {
                transform: scale(1.05);
                transition: transform 0.3s ease-in-out;
            }

            /* Untuk memastikan layout responsif */
            @media (max-width: 768px) {
                .col-md-4 {
                    width: 100% !important;
                }
            }
        </style>
    </div>
    <!-- Dashboard Content End -->
@endsection
