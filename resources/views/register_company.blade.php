<head>
    <title>TeachHub Academy</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    {{-- WEB ICON --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon_logo.png') }}">

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"> --}}

</head>

<!-- Spinner Start -->
<div id="spinner"
    class="bg-white show position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <img src="{{ asset('images/x.svg') }}" alt="Loading..." style="width: 16rem; height: 20rem;">
</div>
<!-- Spinner End -->
<div class="container-fluid">
    <div class="row no-gutter">
        <!-- The image half -->
        <div class="col-md-6 d-none d-md-flex bg-image"></div>


        <!-- The content half -->
        <div class="col-md-6 bg-light">
            <div class="login d-flex align-items-center py-5">

                <!-- Demo content-->
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 col-xl-7 mx-auto">
                            <div class="logo">
                                <a href="/home">
                                    <img src="{{ asset('images/logo-cerah.png') }}" alt="Loading..."
                                        style="width: 100%; height: 8rem;" class="content-center">
                                </a>
                                <p class="text-muted mb-4">Silahkan Daftar Perusahaan Anda</p>
                            </div>
                            <form method="POST" action="{{ route('register.company.submit') }}">
                                @csrf
                                <style>
                                    .password-toggle {
                                        position: absolute;
                                        top: 50%;
                                        right: 30px;
                                        transform: translateY(-50%);
                                        cursor: pointer;
                                    }
                                </style>

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="form-group mb-3">
                                    <input id="inputName" type="text" name="name" placeholder="Nama Perusahaan"
                                        required="" autofocus=""
                                        class="form-control rounded-pill border-0 shadow-sm px-4">
                                </div>
                                <div class="form-group mb-3">
                                    <input id="inputEmail" type="email" name="email" placeholder="Email perusahaan"
                                        required="" class="form-control rounded-pill border-0 shadow-sm px-4">
                                </div>
                                <div class="form-group mb-3">
                                    <input id="inputPassword" type="password" name="password" placeholder="Password"
                                        required=""
                                        class="form-control rounded-pill border-0 shadow-sm px-4 text-primary">
                                </div>
                                <div class="form-group mb-3">
                                    <input id="inputPasswordConfirmation" type="password" name="password_confirmation"
                                        placeholder="Confirm Password" required=""
                                        class="form-control rounded-pill border-0 shadow-sm px-4 text-primary">
                                </div>
                                <div class="custom-control custom-checkbox mb-3">
                                    <input id="customCheck1" type="checkbox" checked class="custom-control-input">

                                </div>
                                <button type="submit"
                                    class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">Sign
                                    Up</button>
                                <div class="mt-3 text-center">
                                    <p>Sudah punya akun? <a href="{{ route('login') }}" class="text-primary">Silakan
                                            login</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- End -->

            </div>
        </div><!-- End -->

    </div>
</div>
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


<!-- Template Javascript -->
<script src="{{ asset('theme/js/main.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const newPassword = document.getElementById('inputPassword');
        const renewPassword = document.getElementById('inputPasswordConfirmation');

        function validatePassword() {
            if (newPassword.value !== renewPassword.value) {
                renewPassword.setCustomValidity("Password tidak cocok");
                renewPassword.style.borderColor = "red"; // Mengubah warna border
                newPassword.style.borderColor = "red";
            } else {
                renewPassword.setCustomValidity("");
                renewPassword.style.borderColor = "green"; // Mengembalikan warna border
                newPassword.style.borderColor = "green";

            }
        }

        newPassword.addEventListener('input', validatePassword);
        renewPassword.addEventListener('input', validatePassword);
    });

    function togglePasswordVisibility(inputId, iconId) {
        const passwordInput = document.getElementById(inputId);
        const icon = document.getElementById(iconId);

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.remove('bi-eye-slash');
            icon.classList.add('bi-eye');
        } else {
            passwordInput.type = 'password';
            icon.classList.remove('bi-eye');
            icon.classList.add('bi-eye-slash');
        }
    }

    document.getElementById('toggleCurrentPassword').addEventListener('click', function() {
        togglePasswordVisibility('currentPassword', 'toggleCurrentPassword');
    });

    document.getElementById('toggleNewPassword').addEventListener('click', function() {
        togglePasswordVisibility('newPassword', 'toggleNewPassword');
    });

    document.getElementById('toggleRenewPassword').addEventListener('click', function() {
        togglePasswordVisibility('renewPassword', 'toggleRenewPassword');
    });
</script>

<style>
    /*
*
* ==========================================
* CUSTOM UTIL CLASSES
* ==========================================
*
*/
    .login,
    .image {
        min-height: 100vh;
    }

    .bg-image {
        background-image: url("{{ asset('images/bg_company.jpg') }}");
        background-size: cover;
        background-position: center center;
    }

    .logo {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        {{--  height: 100vh; /* Menyesuaikan tinggi layar */  --}} text-align: center;
    }
</style>
