@extends('theme')
@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb position-relative">
        <div class="background-pattern"></div>
        <ul class="breadcrumb-animation">
            @for ($i = 0; $i < 10; $i++)
                <li>
                </li>
            @endfor
        </ul>
        <div class="container py-5 text-center">
            <h1 class="display-3 text-gradient wow fadeInDown" data-wow-delay="0.1s">Contact Us</h1>
            <p class="lead wow fadeInUp" data-wow-delay="0.2s">Get in touch with us</p>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="py-5 container-fluid">
        <div class="container">
            <div class="row g-5">
                <!-- Contact Info -->
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="contact-info">
                        <div class="mb-4 section-title">
                            <span class="sub-title">Contact Us</span>
                            <h2>Get In Touch</h2>
                        </div>

                        <div class="mb-4 contact-card">
                            <div class="icon-box">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="info">
                                <h4>Our Location</h4>
                                <p>SMK PELITA AL-IKHSAN, Ujungjaya, Sumedang</p>
                            </div>
                        </div>

                        <div class="mb-4 contact-card">
                            <div class="icon-box">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="info">
                                <h4>Call Us</h4>
                                <p>+62 813 9514 7197</p>
                            </div>
                        </div>

                        <div class="mb-4 contact-card">
                            <div class="icon-box">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="info">
                                <h4>Email Us</h4>
                                <p>pelitatefa09@gmail.com</p>
                            </div>
                        </div>

                        <!-- Social Media -->
                        <div class="social-links">
                            <h4 class="mb-3">Follow Us</h4>
                            <div class="gap-3 d-flex">
                                <a href="https://www.instagram.com/pelita_dev" class="social-btn instagram" target="_blank">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="#" class="social-btn facebook">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="social-btn twitter">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <!-- Form Kontak -->
                <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="contact-form">
                        <form onsubmit="sendMail(event)">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" placeholder="Your Name">
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" placeholder="Your Email">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="subject" placeholder="Subject">
                                        <label for="subject">Subject</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 150px"></textarea>
                                        <label for="message">Message</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="px-5 py-3 btn btn-primary" type="submit">
                                        Send Message
                                        <i class="fas fa-paper-plane ms-2"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <script>
                    function sendMail(event) {
                        event.preventDefault(); // Mencegah submit form biasa

                        // Ambil nilai dari input form
                        const name = document.getElementById('name').value;
                        const email = document.getElementById('email').value;
                        const subject = document.getElementById('subject').value;
                        const message = document.getElementById('message').value;

                        // Membentuk link mailto
                        const mailtoLink =
                            `mailto:pelitatefa09@gmail.com?subject=${encodeURIComponent(subject)}&body=${encodeURIComponent("Name: " + name + "\nEmail: " + email + "\n\nMessage:\n" + message)}`;

                        // Membuka link mailto
                        window.location.href = mailtoLink;
                    }
                </script>

            </div>

            <!-- Map -->
            <div class="mt-5 row">
                <div class="col-12 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="map-container">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.327203828082!2d108.11762297587393!3d-6.7298741658035555!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6ed5eca345f52b%3A0x3a1aed6c68f272f4!2sSMK%20PELITA%20AL-IKHSAN!5e0!3m2!1sen!2sid!4v1728957605292!5m2!1sen!2sid"
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Contact Info Styling */
        .contact-card {
            display: flex;
            align-items: center;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }

        .contact-card:hover {
            transform: translateY(-5px);
        }

        .icon-box {
            width: 50px;
            height: 50px;
            background: #007bff;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
        }

        .icon-box i {
            color: white;
            font-size: 1.5rem;
        }

        /* Social Media Buttons */
        .social-btn {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: all 0.3s ease;
        }

        .social-btn:hover {
            transform: translateY(-5px);
        }

        .instagram {
            background: #E1306C;
        }

        .facebook {
            background: #4267B2;
        }

        .twitter {
            background: #1DA1F2;
        }

        /* Contact Form */
        .contact-form {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        }

        .form-floating>.form-control {
            border-radius: 10px;
        }

        /* Map Container */
        .map-container {
            position: relative;
            height: 400px;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .map-container iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .contact-info {
                margin-bottom: 30px;
            }
        }
    </style>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Fungsi Validasi Email
        function validateEmail(email) {
            const re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            return re.test(email);
        }

        // Form validation dengan SweetAlert
        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault(); // Mencegah submit default

            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const subject = document.getElementById('subject').value;
            const message = document.getElementById('message').value;

            if (name === "" || email === "" || subject === "" || message === "") {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'Semua kolom harus diisi.',
                });
                return;
            }

            if (!validateEmail(email)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Masukkan email yang valid.',
                });
                return;
            }

            // Tampilkan pesan berhasil dengan SweetAlert
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'Pesan berhasil dikirim!',
            });
        });

        function validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(String(email).toLowerCase());
        }

        // Animate elements on scroll
        window.addEventListener('scroll', function() {
            const elements = document.querySelectorAll('.contact-card');
            elements.forEach(element => {
                if (isInViewport(element)) {
                    element.style.transform = 'translateY(-5px)';
                }
            });
        });

        function isInViewport(element) {
            const rect = element.getBoundingClientRect();
            return (
                rect.top >= 0 &&
                rect.left >= 0 &&
                rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) && rect.right <= (window
                    .innerWidth ||
                    document.documentElement.clientWidth));
        }
    </script>
@endsection
