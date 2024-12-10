@extends('theme')
@section('content')
    <!-- Hero Header Start -->
    <div class="hero-section position-relative">
        <!-- Gradient Overlay -->
        <div class="gradient-overlay"></div>
        <!-- Background Animation -->
        <div class="animated-background"></div>
        <!-- Main Content -->
        <div class="container position-relative z-index-2">
            <div class="row gy-5 align-items-center">
                <div class="col-lg-6 wow fadeInLeft" data-aos="zoom-in">
                    <div class="hero-content">
                        <span class="mb-3 badge bg-primary">Platform Edukasi #1</span>
                        <h1 class="mb-4 display-4 text-gradient">TeachHub</h1>
                        <p class="mb-4 lead">Selamat datang di TeachHub, platform inovatif yang dirancang khusus untuk
                            membantu
                            guru dan lulusan baru dalam meningkatkan keterampilan dan pengetahuan mereka.</p>
                        <div class="gap-3 d-flex">
                            <a href="/register" class="btn btn-primary btn-lg rounded-pill" onclick="showChoiceAlert()">
                                Get Started <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                            <a href="#features" class="btn btn-outline-primary btn-lg rounded-pill">
                                Learn More <i class="fas fa-info-circle ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInRight" data-aos="fade-up" data-aos-duration="300">
                    <div class="hero-image-wrapper">
                        <img src="{{ asset('theme/img/hero-img-1.png') }}" class="hero-image" alt="Hero Image">
                        <div class="floating-shapes">
                            <div class="shape shape-1"></div>
                            <div class="shape shape-2"></div>
                            <div class="shape shape-3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <section id="features" class="py-5">
        <div class="container "data-aos="fade-up" data-aos-duration="300">
            <div class="mb-5 text-center">
                <h2 class="mb-3 display-5">Kenapa Memilih TeachHub?</h2>
                <p class="lead text-muted">Platform terbaik untuk mengembangkan karir Anda</p>
            </div>

            <div class="row g-4">
                <!-- Feature Cards -->
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="feature-card">
                        <div class="icon-wrapper">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <h3>Pelatihan Berkualitas</h3>
                        <p>Materi pembelajaran yang terstruktur dan up-to-date</p>
                    </div>
                </div>

                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="feature-card">
                        <div class="icon-wrapper">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3>Instruktur Profesional</h3>
                        <p>Dibimbing oleh para ahli di bidangnya</p>
                    </div>
                </div>

                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="feature-card">
                        <div class="icon-wrapper">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <h3>Sertifikasi Resmi</h3>
                        <p>Dapatkan sertifikat yang diakui industri</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <div class="py-5 container-fluid bg-light" data-aos="fade-up" data-aos-duration="600">
        <div class="container">
            <div class="text-center row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="counter-card">
                        <i class="mb-3 fas fa-user-graduate fa-3x text-primary"></i>
                        <h2 class="counter" data-target="1000">{{ $penggunaAktif }}</h2>
                        <p>Peserta Aktif</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="counter-card">
                        <i class="mb-3 fas fa-chalkboard-teacher fa-3x text-primary"></i>
                        <h2 class="counter" data-target="50">30</h2>
                        <p>Mentor Profesional</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="counter-card">
                        <i class="mb-3 fas fa-book fa-3x text-primary"></i>
                        <h2 class="counter" data-target="100">{{ $totalPelatihan }}</h2>
                        <p>Program Pelatihan</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="counter-card">
                        <i class="mb-3 fas fa-trophy fa-3x text-primary"></i>
                        <h2 class="counter" data-target="95">1</h2>
                        <p>Tingkat Kepuasan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>

    {{--  <!-- Pelatihan Section (Your existing code with improvements) -->  --}}
    <div class="py-5 container-fluid">
        <div class="container">
            <div class="mb-5 text-center section-title">
                <h2 class="display-5">Program Pelatihan Unggulan</h2>
                <p class="lead">Pilih program yang sesuai dengan kebutuhan Anda</p>
            </div>

            <!-- Your existing pelatihan cards with improvements -->
            <!-- Training Cards -->
            <div class="row g-4 justify-content-center"> <!-- Menambahkan justify-content-center -->
                @forelse ($pelatihan as $data)
                    <div class="col-sm-6 col-lg-4 col-xl-3 wow fadeInUp" data-aos="fade-up" data-aos-duration="300">
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
                                            {{ \Carbon\Carbon::parse($data->start_date)->translatedFormat('d M Y') }}
                                        </span>
                                        <span>
                                            <i class="fa fa-clock me-1"></i>
                                            {{ \Carbon\Carbon::parse($data->start_date)->format('H:i') }}
                                        </span>
                                    </div>
                                </div>

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
        </div>
    </div>

    <!-- Testimonial Section -->
    <section class="py-5 testimonial-section bg-light"data-aos="fade-up" data-aos-duration="300">

        <!-- Testimonial Section -->
        {{-- <div class="py-5 container-fluid"> --}}
        <div class="container">
            <div class="mb-5 text-center wow fadeInUp" data-aos="fade-up" data-aos-duration="300">
                <h2 class="display-5">Apa Kata Mereka?</h2>
                <p class="lead">Testimoni dari para alumni TeachHub</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 wow fadeInUp" data-aos="fade-up" data-aos-duration="300">
                    <div class="testimonial-card">
                        <div class="testimonial-img">
                            <img src="{{ asset('NiceAdmin\assets\img\profile-img.jpg') }}" alt="Testimonial">
                        </div>
                        <div class="testimonial-content">
                            <p class="mb-4">"Program pelatihan yang sangat bermanfaat untuk pengembangan karir saya
                                sebagai guru."</p>
                            <h5>Diarxh</h5>
                            <span>Guru Matematika</span>
                        </div>
                    </div>
                </div>
                <!-- Add more testimonials -->
            </div>
        </div>
        {{-- </div> --}}
    </section>

    <!-- CTA Section -->
    <section class="py-5 cta-section"data-aos="fade-up" data-aos-anchor-placement="top-bottom">
        <div class="container text-center">
            <h2 class="mb-4 display-5">Siap Untuk Memulai?</h2>
            <p class="mb-4 lead">Bergabunglah dengan ribuan profesional yang telah meningkatkan karirnya bersama TeachHub
            </p>
            <a href="#" class="btn btn-primary btn-lg rounded-pill" onclick="showChoiceAlert()">
                Daftar Sekarang <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </section>

    <style>
        .centered-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            /* Jika Anda ingin menumpuk elemen secara vertikal */
        }

        /* Feature Cards */
        .feature-card {
            padding: 2rem;
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            text-align: center;
            height: 100%;
        }

        .feature-card:hover {
            transform: translateY(-10px);
        }

        .icon-box {
            width: 80px;
            height: 80px;
            background: rgba(0, 123, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
        }

        .icon-box i {
            font-size: 2rem;
            color: #007bff;
        }

        /* Counter Cards */
        .counter-card {
            padding: 2rem;
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .counter-card:hover {
            transform: translateY(-5px);
        }

        .counter {
            font-size: 3rem;
            font-weight: bold;
            color: #007bff;
        }

        /* Testimonial Cards */
        .testimonial-card {
            padding: 2rem;
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            text-align: center;
        }

        .testimonial-img {
            width: 100px;
            height: 100px;
            margin: 0 auto 1.5rem;
            overflow: hidden;
            border-radius: 50%;
        }

        .testimonial-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Hero Section Styling */
        /* Hapus animasi float dari hero-image */
        .hero-image {
            width: 100%;
            height: auto;
            position: relative;
            z-index: 2;
            /* Hapus animation: float */
        }

        /* Gunakan animasi hanya untuk elemen dekoratif */
        .floating-shapes .shape {
            position: absolute;
            border-radius: 50%;
            background: rgba(0, 123, 255, 0.1);
            animation: float 6s ease-in-out infinite;
        }

        /* Tambahkan efek hover yang lebih halus untuk gambar */
        .hero-image-wrapper {
            position: relative;
            padding: 2rem;
            transition: transform 0.3s ease;
        }

        .hero-image-wrapper:hover {
            transform: translateY(-5px);
        }

        /* Animasi untuk elemen dekoratif saja */
        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        .hero-section {
            min-height: 80vh;
            padding-top: calc(70px + 2rem);
            /* 70px navbar height + extra padding */
            position: relative;
            overflow: hidden;
            background: #f8f9fa;
        }

        /* Gradient Overlay */
        .gradient-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(180deg,
                    rgba(255, 255, 255, 0.95) 0%,
                    rgba(255, 255, 255, 0.8) 20%,
                    rgba(255, 255, 255, 0.6) 100%);
            z-index: 1;
        }

        /* Animated Background */
        .animated-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, #007bff15 0%, #00ff8815 100%);
            animation: gradient 15s ease infinite;
            z-index: 0;
        }

        /* Content Z-index */
        .z-index-2 {
            position: relative;
            z-index: 2;
        }

        /* Hero Content Styling */
        .hero-content {
            padding: 2rem 0;
        }

        .text-gradient {
            background: linear-gradient(45deg, #007bff, #00ff88);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Hero Image Styling */
        .hero-image-wrapper {
            position: relative;
            padding: 2rem;
        }

        /* Floating Shapes */
        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
        }

        .shape {
            position: absolute;
            border-radius: 50%;
            background: rgba(0, 123, 255, 0.1);
        }

        .shape-1 {
            width: 100px;
            height: 100px;
            top: 20%;
            left: 10%;
            animation: float 8s ease-in-out infinite;
        }

        .shape-2 {
            width: 150px;
            height: 150px;
            top: 50%;
            right: 10%;
            animation: float 10s ease-in-out infinite;
        }

        .shape-3 {
            width: 70px;
            height: 70px;
            bottom: 20%;
            left: 20%;
            animation: float 6s ease-in-out infinite;
        }

        /* Animations */
        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        /* Navbar Styling (Add to your existing navbar) */
        .navbar {
            transition: all 0.3s ease;
            background: transparent;
        }

        .navbar.scrolled {
            background: rgba(255, 255, 255, 0.95) !important;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-section {
                padding-top: calc(60px + 1rem);
            }

            .hero-content {
                text-align: center;
            }

            .floating-shapes {
                display: none;
            }
        }

        .text-gradient {
            background: linear-gradient(45deg, #007bff, #00ff88);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Feature Cards */
        .feature-card {
            padding: 30px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-10px);
        }

        .icon-wrapper {
            width: 70px;
            height: 70px;
            background: #007bff15;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }

        .icon-wrapper i {
            font-size: 30px;
            color: #007bff;
        }

        /* Statistics */
        .stat-card {
            padding: 30px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .stat-number {
            font-size: 3rem;
            font-weight: bold;
            color: #007bff;
            margin-bottom: 10px;
        }

        /* Animations */
        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-header {
                padding: 60px 0;
            }

            .display-4 {
                font-size: 2.5rem;
            }
        }
    </style>

    <script>
        // Counter Animation
        const counters = document.querySelectorAll('.counter');
        counters.forEach(counter => {
            const target = +counter.getAttribute('data-target');
            const increment = target / 200;

            function updateCount() {
                const count = +counter.innerText;
                if (count < target) {
                    counter.innerText = Math.ceil(count + increment);
                    setTimeout(updateCount, 10);
                } else {
                    counter.innerText = target;
                }
            }

            updateCount();
        });
        // Navbar Scroll Effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
        window.addEventListener('scroll', function() {
            const heroImage = document.querySelector('.hero-image-wrapper');
            const scrolled = window.pageYOffset;

            // Subtle parallax effect
            heroImage.style.transform = `translateY(${scrolled * 0.1}px)`;
        });

        // Your existing scripts

        // Statistics Counter Animation
        const counters = document.querySelectorAll('.stat-number');
        counters.forEach(counter => {
            const target = parseInt(counter.getAttribute('data-target'));
            const increment = target / 200;

            function updateCount() {
                const count = parseInt(counter.innerText);
                if (count < target) {
                    counter.innerText = Math.ceil(count + increment);
                    setTimeout(updateCount, 10);
                } else {
                    counter.innerText = target;
                }
            }

            updateCount();
        });

        // Your existing scripts
    </script>
@endsection
