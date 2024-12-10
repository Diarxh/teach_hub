@extends('theme')
@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb position-relative">
        <div class="background-pattern"></div>
        <ul class="breadcrumb-animation">
            @for ($i = 0; $i < 10; $i++)
                <li></li>
            @endfor
        </ul>
        <div class="container text-center py-5">
            <h1 class="display-3 mb-4 text-gradient wow fadeInDown" data-wow-delay="0.1s">About Us</h1>
            <p class="lead wow fadeInUp" data-wow-delay="0.2s">Discover Our Journey in Education</p>
        </div>
    </div>
    <!-- Header End -->

    <!-- About Start -->
    <div class="container-fluid overflow-hidden py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <!-- Image Section -->
                <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.1s">
                    <div class="position-relative image-wrapper">
                        <div class="about-img-bg"></div>
                        <img src="{{ asset('/images/about.png') }}" class="img-fluid rounded-3 shadow-lg"
                            alt="About TeachHub">
                        <div class="experience-badge">
                            <span class="number">5+</span>
                            <span class="text">Years of Excellence</span>
                        </div>
                    </div>
                </div>

                <!-- Content Section -->
                <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.3s">
                    <div class="about-content">
                        <span class="sub-title">About Us</span>
                        <h2 class="display-5 mb-4">Apa itu TeachHub Academy?</h2>
                        <p class="lead mb-4">TeachHub Academy adalah platform edukasi yang dirancang khusus untuk mendukung
                            pengembangan profesional guru dan lulusan baru.</p>

                        <!-- Features -->
                        <div class="features-grid">
                            <div class="feature-item" data-aos="fade-up">
                                <i class="fas fa-graduation-cap"></i>
                                <h4>Professional Training</h4>
                                <p>Pelatihan berkualitas tinggi</p>
                            </div>
                            <div class="feature-item" data-aos="fade-up" data-aos-delay="100">
                                <i class="fas fa-laptop-code"></i>
                                <h4>Digital Skills</h4>
                                <p>Microsoft Office & Coding</p>
                            </div>
                            <div class="feature-item" data-aos="fade-up" data-aos-delay="200">
                                <i class="fas fa-users"></i>
                                <h4>Expert Mentors</h4>
                                <p>Bimbingan profesional</p>
                            </div>
                            <!-- Fitur Baru 1 -->
                            <div class="feature-item" data-aos="fade-up" data-aos-delay="300">
                                <i class="fas fa-clock"></i>
                                <h4>Flexible Scheduling</h4>
                                <p>Kelas dapat dijadwalkan ulang untuk kenyamanan Anda.</p>
                            </div>
                            <!-- Fitur Baru 2 -->
                            <div class="feature-item" data-aos="fade-up" data-aos-delay="400">
                                <i class="fas fa-certificate"></i>
                                <h4>Certification</h4>
                                <p>Dapatkan sertifikat setelah menyelesaikan kursus.</p>
                            </div>
                            <!-- Fitur Baru 3 -->
                            <div class="feature-item" data-aos="fade-up" data-aos-delay="500">
                                <i class="fas fa-comments"></i>
                                <h4>Community Support</h4>
                                <p>Bergabunglah dengan komunitas kami untuk berdiskusi dan belajar bersama.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Stats Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="row g-4 text-center">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="stat-card">
                        <i class="fas fa-user-graduate fa-3x mb-3"></i>
                        <h2 class="counter">1000+</h2>
                        <p>Students Trained</p>
                    </div>
                </div>
                <!-- Stats Card 2 -->
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="stat-card">
                        <i class="fas fa-book fa-3x mb-3"></i>
                        <h2 class="counter">50+</h2>
                        <p>Courses Available</p>
                    </div>
                </div>
                <!-- Stats Card 3 -->
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="stat-card">
                        <i class="fas fa-chalkboard-teacher fa-3x mb-3"></i>
                        <h2 class="counter">20+</h2>
                        <p>Expert Mentors</p>
                    </div>
                </div>
                <!-- Stats Card 4 -->
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="stat-card">
                        <i class="fas fa-users fa-3x mb-3"></i>
                        <h2 class="counter">5000+</h2>
                        <p>Registered Users</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Stats Section End -->
    <!-- Info Box Start -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="row g-4 text-center">
                <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="info-box">
                        <h2 class="display-5 mb-3">Why Choose TeachHub Academy?</h2>
                        <p class="lead mb-4">Discover the benefits of choosing TeachHub Academy for your education needs.
                        </p>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check"></i> Comprehensive Curriculum</li>
                            <li><i class="fas fa-check"></i> Experienced Instructors</li>
                            <li><i class="fas fa-check"></i> Flexible Learning Options</li>
                            <li><i class="fas fa-check"></i> Affordable Pricing</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Info Box End -->

    <style>
        /* Gradient Text */
        .text-gradient {
            background: linear-gradient(45deg, #007bff, #00ff88);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Mengatur warna aksen biru */
        body {
            background-color: #f8f9fa;
            /* Warna latar belakang halaman */
        }

        h2,
        .sub-title {
            color: #007bff;
            /* Aksen biru pada judul */
        }

        /* Stats Cards */
        .stat-card {
            background: #e9f7fe;
            /* Latarnya menjadi biru muda */
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
            background: #d0e9ff;
            /* Warna lebih gelap saat di-hover */
        }

        /* Feature Items */
        .feature-item {
            background: #e9f7fe;
            /* Latarnya menjadi biru muda */
        }

        .feature-item:hover {
            background: #d0e9ff;
            /* Lebih gelap saat di-hover */
        }

        /* Info Box Styles */
        .info-box {
            background: white;
            /* Ubah background jika diperlukan */
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        /* Warna ikon */
        .feature-item i,
        .stat-card i {
            color: #007bff;
            /* Warna ikon biru */
        }

        /* Gradient Text */
        .text-gradient {
            background: linear-gradient(45deg, #007bff, #00ff88);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Image Styling */
        .image-wrapper {
            position: relative;
            z-index: 1;
        }

        .about-img-bg {
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, #007bff15, #00ff8815);
            transform: rotate(-3deg);
            border-radius: 20px;
            z-index: -1;
        }

        .experience-badge {
            position: absolute;
            right: -20px;
            bottom: 30px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .experience-badge .number {
            font-size: 2rem;
            font-weight: bold;
            color: #007bff;
            display: block;
        }

        /* Features Grid */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .feature-item {
            text-align: center;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }

        .feature-item:hover {
            transform: translateY(-5px);
        }

        .feature-item i {
            color: #007bff;
            font-size: 2rem;
            margin-bottom: 15px;
        }

        /* Stats Cards */
        .stat-card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        /* Info Box Styles */
        .info-box {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }

        .info-box:hover {
            transform: translateY(-5px);
        }

        .info-box h2 {
            color: #007bff;
        }

        .info-box ul {
            list-style: none;
            padding: 0;
        }

        .info-box ul li {
            margin-bottom: 10px;
        }

        .info-box ul li i {
            margin-right: 10px;
            color: #007bff;
            font-size: 1.2rem;
        }

        /* Animations */
        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        .floating {
            animation: float 3s ease-in-out infinite;
        }
    </style>

    <script>
        // Counter Animation
        document.addEventListener('DOMContentLoaded', function() {
            const counters = document.querySelectorAll('.counter');
            counters.forEach(counter => {
                const target = +counter.innerText.replace('+', '');
                const increment = target / 100;

                let count = 0;
                const updateCounter = () => {
                    if (count < target) {
                        count += increment;
                        counter.innerText = Math.ceil(count) + '+';
                        setTimeout(updateCounter, 10);
                    }
                };
                updateCounter();
            });
        });
    </script>
@endsection
