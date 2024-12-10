<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>TeachHub Academy</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    {{-- WEB ICON --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon_logo.png') }}">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700&family=Rubik:wght@400;500&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('theme/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('theme/css/bootstrap.min.css') }}" rel="stylesheet">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> --}}

    <!-- Template Stylesheet -->
    <link href="{{ asset('theme/css/style.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    {{--  <!-- Vendor CSS Files -->
        <link href="{{ asset ('NiceAdmin/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset ('NiceAdmin/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
        <link href="{{ asset ('NiceAdmin/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
        <link href="{{ asset ('NiceAdmin/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
        <link href="{{ asset ('NiceAdmin/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
        <link href="{{ asset ('NiceAdmin/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
        <link href="{{ asset ('NiceAdmin/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">  --}}

</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="bg-white show position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <img src="{{ asset('images/x.svg') }}" alt="Loading..." style="width: 16rem; height: 20rem;">
    </div>
    <!-- Spinner End -->


    <div class="container-fluid header position-relative p-0">
        <nav class="navbar navbar-expand-lg fixed-top navbar-light px-lg-5 py-lg-0 px-4 py-3">
            <a href="/home" class="navbar-brand p-0">
                <img src="{{ asset('images/x.svg') }}" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    @if (auth()->check())
                        <a href="/profile" class="nav-item nav-link">
                            Hello, {{ Auth::user()->name }}
                        </a>
                        <a href="/user/dashboard" class="nav-item nav-link active">Dashboard</a>
                        <a href="/list_pelatihan" class="nav-item nav-link">Pelatihan</a>
                        <a href="/pelatihan_saya" class="nav-item nav-link">Pelatihan Saya</a>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-primary rounded-pill px-4 py-2 text-white">Logout</button>
                </form>
            @else
                <a href="/home" class="nav-item nav-link active">Home</a>
                <a href="/list_pelatihan" class="nav-item nav-link">Pelatihan</a>
                <a href="/tipepelatihan" class="nav-item nav-link">Tipe Pelatihan</a>

                <a href="/contact" class="nav-item nav-link">Contact Us</a>
                <a href="/about" class="nav-item nav-link">About</a>
            </div>
            <a href="/login" class="btn btn-light border-primary rounded-pill text-primary me-4 border px-4 py-2">Log
                In</a>
            <a href="/register" class="btn btn-primary rounded-pill px-4 py-2 text-white">Sign Up</a>
            @endif
    </div>



    </nav>
    </div>
    <!-- nav bar end --!>


            @yield('content')

            <!-- Footer Start -->
    <div class="py-5 container-fluid footer wow fadeIn" data-wow-delay="0.2s">
        <div class="container py-5">
            <div class="row g-5">
                <!-- Menu Navigation -->
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item d-flex flex-column">
                        <h4 class="mb-4 text-dark">Menu</h4>
                        <a href="/home" class="mb-2"><i class="fas fa-home me-2"></i>Home</a>
                        <a href="/list_pelatihan" class="mb-2"><i class="fas fa-graduation-cap me-2"></i>Pelatihan</a>
                        <a href="/tipepelatihan" class="mb-2"><i class="fas fa-list me-2"></i>Tipe Pelatihan</a>
                        <a href="/contact" class="mb-2"><i class="fas fa-envelope me-2"></i>Contact Us</a>
                        <a href="/about" class="mb-2"><i class="fas fa-info-circle me-2"></i>About</a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item d-flex flex-column">
                        <h4 class="mb-4 text-dark">Quick Links</h4>
                        <a href="" class="mb-2"><i class="fas fa-angle-right me-2"></i>About Us</a>
                        <a href="" class="mb-2"><i class="fas fa-angle-right me-2"></i>Contact Us</a>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item d-flex flex-column">
                        <h4 class="mb-4 text-dark">Contact Info</h4>
                        <a href="" class="mb-2"><i class="fa fa-map-marker-alt me-2"></i>Jln Raden Ali
                            Sadikin KM.6, Ujungjaya, Ujungjaya, Sumedang</a>
                        <a href="mailto:pelitatefa09@gmail.com" class="mb-2"><i
                                class="fas fa-envelope me-2"></i>pelitatefa09@gmail.com</a>
                        <a href="tel:+6281395147197" class="mb-2"><i class="fas fa-phone me-2"></i>+62 813 9514
                            7197</a>
                        <a href="tel:+01234567890" class="mb-3"><i class="fas fa-print me-2"></i>+012 345 67890</a>

                        <!-- Social Media -->
                        <div class="d-flex align-items-center">
                            <i class="fas fa-share fa-2x text-secondary me-2"></i>
                            <a class="mx-1 btn-square btn btn-primary rounded-circle" href=""><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="mx-1 btn-square btn btn-primary rounded-circle" href=""><i
                                    class="fab fa-twitter"></i></a>
                            <a class="mx-1 btn-square btn btn-primary rounded-circle" href=""><i
                                    class="fab fa-instagram"></i></a>
                            <a class="mx-1 btn-square btn btn-primary rounded-circle" href=""><i
                                    class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->





    <!-- Copyright Start -->
    <div class="py-4 container-fluid copyright">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="text-center col-md-6 text-md-start mb-md-0">
                    <span class="text-white"><a href="#"><i
                                class="fas fa-copyright text-light me-2"></i>TeachHub Academy</a> "Belajar sambil
                        berkarya siap hadapi dunia nyata".</span>
                </div>
                <div class="text-center text-white col-md-6 text-md-end">
                    <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                    <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                    <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                    Designed By <a class="border-bottom" href="https://htmlcodex.com">Tim It PELITA Dev.</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->
    <!-- Button trigger modal -->
    {{--  <a href="#" class="btn btn-primary rounded-pill text-white py-2 px-4" id="loginLink">Sign Up</a>   --}}

    <!-- Modal -->
    <div class="modal fade custom-modal" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <iframe id="loginIframe" src="" style="width: 100%; border: none;"></iframe>
                </div>
            </div>
        </div>
    </div>






    <script>
        /* Add this to your existing JavaScript */
        document.addEventListener('DOMContentLoaded', function() {
                const container = document.querySelector('.floating-dots');

                for (let i = 0; i < 20; i++) {
                    const dot = document.createElement('div');
                    dot.className = 'dot';

                    dot.style.left = `$ {
                        Math.random() * 100
                    }

                    %`;

                    dot.style.animationDelay = `$ {
                        Math.random() * 15
                    }

                    s`;
                    container.appendChild(dot);
                }
            }

        );
    </script>
    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="'{{ asset('theme/lib/wow/wow.min.js') }}"></script>
    <script src="'{{ asset('theme/lib/easing/easing.min.js') }}"></script>
    <script src="'{{ asset('theme/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="'{{ asset('theme/lib/counterup/counterup.min.js') }}"></script>
    <script src="'{{ asset('theme/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="'{{ asset('theme/lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        AOS.init();
    </script>
    <!-- Template Javascript -->
    <script src="{{ asset('theme/js/main.js') }}"></script>


    {{-- STYLE HASIL GENERATE AI  --}}
    <style>
        .footer-item a {
            color: #666;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .footer-item a:hover {
            color: #0d6efd;
            padding-left: 5px;
        }

        .btn-square {
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .btn-square:hover {
            transform: translateY(-2px);
        }

        /* AKSEN  */

        /* Background Pattern & Accents */
        .background-pattern {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background:
                linear-gradient(120deg, #f8f9fa 0%, #ffffff 100%),
                radial-gradient(circle at 50% 50%, #e9ecef 0%, transparent 50%);
            opacity: 0.7;
            z-index: -1;
        }

        .container-fluid {
            position: relative;
        }

        /* Accent Shapes */
        .bg-breadcrumb::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, #007bff15 0%, transparent 70%);
            border-radius: 50%;
        }

        .bg-breadcrumb::after {
            content: '';
            position: absolute;
            bottom: -50px;
            left: -50px;
            width: 200px;
            height: 200px;
            background: repeating-linear-gradient(45deg,
                    #f8f9fa,
                    #f8f9fa 10px,
                    #ffffff 10px,
                    #ffffff 20px);
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
        }

        /* Card Accents */
        .training-card {
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        }

        .training-card::before {
            content: '';
            position: absolute;
            top: -5px;
            right: -5px;
            width: 20px;
            height: 20px;
            background: #007bff;
            border-radius: 50%;
            opacity: 0.1;
        }

        /* Animated Background Elements */
        .floating-dots {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }

        .dot {
            position: absolute;
            width: 10px;
            height: 10px;
            background: #007bff;
            border-radius: 50%;
            opacity: 0.1;
            animation: float 15s infinite linear;
        }

        @keyframes float {
            0% {
                transform: translateY(0) rotate(0deg);
            }

            100% {
                transform: translateY(-100vh) rotate(360deg);
            }
        }

        /* Section Title Enhancement */
        .section-title::before {
            content: '';
            position: absolute;
            top: -20px;
            left: 50%;
            transform: translateX(-50%);
            width: 40px;
            height: 40px;
            background:
                linear-gradient(45deg, transparent 45%, #007bff 45%, #007bff 55%, transparent 55%),
                linear-gradient(-45deg, transparent 45%, #007bff 45%, #007bff 55%, transparent 55%);
            opacity: 0.1;
        }

        /* Search Bar Enhancement */
        .search-wrapper::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 2px;
            background: linear-gradient(90deg, transparent, #007bff, transparent);
        }

        /* Add this to your existing JavaScript */
        document.addEventListener('DOMContentLoaded', function() {
                const container=document.querySelector('.floating-dots');

                for (let i=0; i < 20; i++) {
                    const dot=document.createElement('div');
                    dot.className = 'dot';

                    dot.style.left=`$ {
                        Math.random() * 100
                    }

                    %`;

                    dot.style.animationDelay=`$ {
                        Math.random() * 15
                    }

                    s`;
                    container.appendChild(dot);
                }
            });
    </style>


</body>

</html>
