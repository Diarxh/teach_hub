@extends('theme')
@section('content')
    <!-- Hero Header Start -->
    <div class="overflow-hidden px-5 hero-header" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
        <div class="rotate-img">
            <img src="{{ asset('theme/img/sty-1.png') }}" class="img-fluid w-100" alt="">
            <div class="rotate-sty-2"></div>
        </div>
        <div class="row gy-5 align-items-center">
            <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.4s">
                <div class="mx-auto mb-5 text-center" data-aos="fade-up" data-aos-anchor-placement="top-bottom"
                    style="max-width: 900px;">
                    <h1 class="mb-4 display-4 text-dark">TeachHub</h1>
                    <p class="mb-4 fs-4">Selamat datang di TeachHub, platform inovatif yang dirancang khusus untuk membantu
                        guru dan lulusan baru dalam meningkatkan keterampilan dan pengetahuan mereka. Di TeachHub, kami
                        memahami tantangan yang dihadapi oleh pendidik dan para pencari kerja di dunia yang terus berubah.
                        Oleh karena itu, kami menyediakan berbagai pelatihan berkualitas yang dapat diakses kapan saja dan
                        di mana saja.</p>
                    <a href="#" class="px-5 py-3 btn btn-primary rounded-pill" onclick="showChoiceAlert()">Get
                        Started</a>

                </div>
            </div>
            <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.2s">
                <img src="{{ asset('theme/img/hero-img-1.png') }}" class="h-auto img-fluid w-100" alt="">
            </div>
        </div>
    </div>
    <!-- Hero Header End -->

    <style>
        .hero-header {
            position: relative;
            overflow: hidden;
            padding: 8rem 0 4rem;
            /* Menambahkan padding atas yang lebih besar */
            margin-top: 2rem;
            /* Menambahkan margin atas */
            background-color: #f8f9fa;
        }

        /* Kode CSS lainnya tetap sama */

        .rotate-img img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: auto;
            z-index: 1;
            opacity: 0.5;
        }

        .text-center {
            position: relative;
            z-index: 2;
        }

        .btn-primary {
            transition: background-color 0.3s, transform 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }
    </style>


    <!-- Blog Start -->
    <div class="overflow-hidden py-5 container-fluid FAQ bg-light" data-aos="fade-up" data-aos-delay="300">
        <div class="container py-5">
            <div class="mx-auto mb-5 wow fadeInUp text-start" data-wow-delay="0.1s" style="max-width: 900px;">
                <h1 class="mb-4 display-5">List Pelatihan</h1>
                <br>
            </div>
            <div class="service-item row g-4 justify-content-center">
                @foreach ($tipepelatihan as $data)
                    {{--  @php
                        dd($tipepelatihan);
                    @endphp  --}}
                    <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="blog-item shadow-effect wow fadeInUp" data-wow-delay="0.2s">
                            <!-- Tambahkan kelas wow di sini -->
                            <div class="blog-img wow fadeInUp" data-wow-delay="0.3s">
                                @if ($data->photo)
                                    <img src="{{ asset('storage/' . $data->photo) }}" alt="{{ $data->trainer_type_name }}"
                                        class="img-fluid slightly-rounded-image"
                                        style="max-height: 100%; width: 100%; object-fit: cover;">
                                @else
                                    <div class="d-flex justify-content-center align-items-center" style="height: 200px;">
                                        <i class="fas fa-mail-bulk fa-8x text-secondary"></i>
                                    </div>
                                @endif

                            </div>
                            <div class="p-4 border blog-content text-dark wow fadeInUp d-flex flex-column"
                                style="min-height: 300px;" data-wow-delay="0.4s">
                                <div class="flex-grow-1">
                                    <h2 class="mb-4 text-center">{{ $data->trainer_type_name }}</h2>
                                    <p class="mb-4 text-left">{!! Str::limit($data->trainer_type_description, 100) !!}</p>
                                </div>
                                <div class="text-center">
                                    <a class="px-4 py-2 btn btn-light rounded-pill shadow-btn"
                                        href="/detail_pelatihan/{{ $data->id }}">Lihat Lebih...</a>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Blog End -->
    <style>
        .slightly-rounded-image {
            border-radius: 10px;
            /* Menambahkan sedikit kelengkungan pada gambar */
        }

        .i {
            display: flex;
            justify-content: center;
        }

        .service-item {
            display: flex;
            /* Menggunakan Flexbox */
            flex-wrap: wrap;
            /* Membungkus item jika diperlukan */
            justify-content: center;
            /* Menyelaraskan item di tengah */
        }

        .blog-item {
            display: flex;
            flex-direction: column;
            /* Mengatur arah kolom untuk item blog */
            height: 100%;
            /* Memastikan item blog mengambil tinggi penuh */
        }

        .blog-content {
            flex-grow: 1;
            /* Memungkinkan konten untuk tumbuh dan mengisi ruang yang tersedia */
        }

        .shadow-effect {
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            /* Mengatur bayangan */
            transition: transform 0.3s;
            /* Efek transisi saat hover */
        }

        .shadow-effect:hover {
            transform: translateY(-5px);
            /* Efek mengangkat saat hover */
        }
    </style>

    <!-- Pricing Start -->
    <div class="py-5 container-fluid price" data-aos="fade-up" data-aos-delay="300">
        <div class="container py-5">
            <div class="mx-auto mb-5 text-center wow fadeInUp" data-wow-delay="0.1s" style="max-width: 900px;">
                <h4 class="text-primary">Paket Berlangganan</h4>
                <h1 class="mb-4 display-5">Pilih Paket yang Sesuai untuk Anda</h1>
                <p class="mb-0">Tingkatkan keterampilan mengajar Anda dengan berbagai pilihan paket berlangganan kami.
                    Setiap paket dirancang untuk memenuhi kebutuhan guru modern dalam mengembangkan kompetensi profesional
                    mereka.</p>
            </div>
            <div class="row g-5 justify-content-center">
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="text-center rounded price-item bg-light">
                        <div class="p-4 text-center text-dark border-bottom d-flex flex-column justify-content-center"
                            style="height: 160px;">
                            <p class="mb-0 fs-2 fw-bold text-uppercase">DASAR</p>
                            <div class="d-flex justify-content-center">
                                <strong class="align-self-start">Rp</strong>
                                <p class="mb-0"><span class="display-5">0</span>/bln</p>
                            </div>
                        </div>
                        <div class="p-5 text-start">
                            <p><i class="fas fa-check text-success me-1"></i> Akses terbatas ke perpustakaan materi</p>
                            <p><i class="fas fa-check text-success me-1"></i> Dukungan pelanggan dasar</p>
                            <p><i class="fas fa-check text-success me-1"></i> 5 pelatihan gratis per bulan</p>
                            <p><i class="fas fa-times text-danger me-1"></i> Sertifikat pelatihan</p>
                            <p><i class="fas fa-times text-danger me-1"></i> Konsultasi pribadi</p>
                            <p class="mb-4"><i class="fas fa-times text-danger me-1"></i> Akses ke webinar eksklusif</p>
                            <a href="#" class="px-5 py-2 btn btn-primary rounded-pill">Mulai Sekarang</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="text-center rounded price-item bg-light">
                        <div class="pice-item-offer">Populer</div>
                        <div class="p-4 text-center text-primary border-bottom d-flex flex-column justify-content-center"
                            style="height: 160px;">
                            <p class="mb-0 fs-2 fw-bold text-uppercase">PROFESIONAL</p>
                            <div class="d-flex justify-content-center">
                                <strong class="align-self-start">Rp</strong>
                                <p class="mb-0"><span class="display-5">199k</span>/bln</p>
                            </div>
                        </div>
                        <div class="p-5 text-start">
                            <p><i class="fas fa-check text-success me-1"></i> Akses penuh ke perpustakaan materi</p>
                            <p><i class="fas fa-check text-success me-1"></i> Dukungan pelanggan prioritas</p>
                            <p><i class="fas fa-check text-success me-1"></i> Pelatihan tak terbatas</p>
                            <p><i class="fas fa-check text-success me-1"></i> Sertifikat pelatihan</p>
                            <p><i class="fas fa-check text-success me-1"></i> 2 sesi konsultasi pribadi per bulan</p>
                            <p class="mb-4"><i class="fas fa-check text-success me-1"></i> Akses ke webinar eksklusif
                            </p>
                            <a href="#" class="px-5 py-2 btn btn-primary rounded-pill">Mulai Sekarang</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="text-center rounded price-item bg-light">
                        <div class="p-4 text-center text-secondary border-bottom d-flex flex-column justify-content-center"
                            style="height: 160px;">
                            <p class="mb-0 fs-2 fw-bold text-uppercase">PREMIUM</p>
                            <div class="d-flex justify-content-center">
                                <strong class="align-self-start">Rp</strong>
                                <p class="mb-0"><span class="display-5">399k</span>/bln</p>
                            </div>
                        </div>
                        <div class="p-5 text-start">
                            <p><i class="fas fa-check text-success me-1"></i> Semua fitur Profesional</p>
                            <p><i class="fas fa-check text-success me-1"></i> Akses ke materi eksklusif</p>
                            <p><i class="fas fa-check text-success me-1"></i> Pelatihan tatap muka bulanan</p>
                            <p><i class="fas fa-check text-success me-1"></i> Sertifikasi tingkat lanjut</p>
                            <p><i class="fas fa-check text-success me-1"></i> Konsultasi pribadi tak terbatas</p>
                            <p class="mb-4"><i class="fas fa-check text-success me-1"></i> Akses VIP ke semua acara</p>
                            <a href="#" class="px-5 py-2 btn btn-primary rounded-pill">Mulai Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pricing End -->



    {{--  <!-- Testimonial Start -->

<div class="container mt-5"  data-aos="fade-up" data-aos-delay="900">
    <h2 class="mb-4 text-center">Testimonial Klien</h2>
    <div class="row">
        <div class="mb-4 col-md-12">
            <div class="text-center card">
                <div class="card-body">
                    <p class="card-text">"Layanan yang luar biasa! Sangat membantu bisnis kami tumbuh."</p>
                    <h5 class="card-title">John Doe</h5>
                    <h6 class="mb-2 card-subtitle text-muted">CEO, Perusahaan ABC</h6>
                </div>
            </div>
        </div>
        <div class="mb-4 col-md-12">
            <div class="text-center card">
                <div class="card-body">
                    <p class="card-text">"Tim yang profesional dan responsif. Saya sangat merekomendasikan mereka."</p>
                    <h5 class="card-title">Jane Smith</h5>
                    <h6 class="mb-2 card-subtitle text-muted">Pengusaha, Perusahaan XYZ</h6>
                </div>
            </div>
        </div>
        <div class="mb-4 col-md-12">
            <div class="text-center card">
                <div class="card-body">
                    <p class="card-text">"Kualitas layanan yang sangat baik. Hasilnya melebihi harapan saya!"</p>
                    <h5 class="card-title">Ali Rahman</h5>
                    <h6 class="mb-2 card-subtitle text-muted">Founder, Startup 123</h6>
                </div>
            </div>
        </div>
    </div>
</div>
        <!-- Testimonial End -->  --}}

    <script>
        function showChoiceAlert() {
            Swal.fire({
                title: 'Pilih Opsi',
                text: 'Silakan pilih salah satu:',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Login',
                cancelButtonText: 'Register',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Aksi untuk Login
                    Swal.fire('Anda memilih Login');
                    // Tambahkan logika untuk mengarahkan ke halaman login
                    window.location.href = '/login'; // Ganti dengan URL halaman login
                } else if (result.isDismissed) {
                    // Aksi untuk Register
                    Swal.fire('Anda memilih Register');
                    // Tambahkan logika untuk mengarahkan ke halaman register
                    window.location.href = '/register'; // Ganti dengan URL halaman register
                }
            });
        }
    </script>
@endsection
