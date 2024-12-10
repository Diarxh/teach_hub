@extends('user.theme')
@section('content')


    <div class="container-fluid bg-breadcrumb py-3">
        <ul class="breadcrumb-animation">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
        <div class="container py-5 text-center" style="max-width: 700px;">
            <h3 class="display-3 wow fadeInDown mb-4" data-wow-delay="0.1s">Profil Pengguna
                </h1>
        </div>
    </div>
    <main id="main" class="main">

        <section class="section profile ">
            <div class="row">
                <div class="col-xl-4">

                    <div class="card shadow">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                            @if ($guru && $guru->photo)
                                <div style="width: 150px; height: 150px; overflow: hidden; border-radius: 50%;">
                                    <img src="{{ asset('storage/' . $guru->photo) }}" alt="{{ $user->name }}"
                                        style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                            @else
                                <i class="fas fa-solid fa-user fa-5x text-secondary rounded-circle"></i>
                            @endif

                            <h2>{{ $user->name }}</h2>
                            <h3>{{ $roles->isNotEmpty() ? $roles->first()->name : 'No Role' }}</h3>
                            <!-- Menampilkan name dari peran pertama -->


                            <div class="social-links mt-2">
                                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="col-xl-8">

                    <div class="card shadow">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview">Overview</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                        Profile</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#profile-settings">Settings</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#profile-change-password">Change Password</button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    @if (!isset($guru))
                                        <div class="alert alert-warning" role="alert">
                                            Data guru belum ada. Silakan tambahkan segera.
                                        </div>
                                    @endif
                                    <h5 class="card-title">About</h5>
                                    <p class="small fst-italic">{{ $guru->about ?? 'Belum ada deskripsi.' }}</p>
                                    <h5 class="card-title">Profile Details</h5>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Full Name</div>
                                        <div class="col-lg-9 col-md-8">{{ $guru->name ?? 'Belum ada nama.' }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Company</div>
                                        <div class="col-lg-9 col-md-8">
                                            {{ $guru->school_name ?? 'Belum ada informasi sekolah.' }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Job</div>
                                        <div class="col-lg-9 col-md-8">{{ $guru->nuptk ?? 'Belum ada informasi nuptk.' }}
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Country</div>
                                        <div class="col-lg-9 col-md-8">{{ $guru->city ?? 'Belum ada informasi negara.' }}
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Address</div>
                                        <div class="col-lg-9 col-md-8">{{ $guru->address ?? 'Belum ada alamat.' }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Phone</div>
                                        <div class="col-lg-9 col-md-8">
                                            {{ $guru->phone_number ?? 'Belum ada nomor telepon.' }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Email</div>
                                        <div class="col-lg-9 col-md-8">{{ $guru->email ?? 'Belum ada email.' }}</div>
                                    </div>
                                </div>

                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                    @if (session('alert'))
                                        <div class="alert alert-warning" role="alert">
                                            {{ session('alert') }}
                                        </div>
                                    @endif
                                    @if (session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session('success') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif

                                    @if (!isset($guru))
                                        <div class="alert alert-warning" role="alert">
                                            Data guru belum ada. Silakan tambahkan segera.
                                        </div>
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
                                                        // Arahkan ke tab Edit Profile
                                                        window.location.href = "{{ route('profile.show') }}#profile-edit";
                                                    }
                                                });

                                                // Jika URL mengandung #profile-edit, aktifkan tab Edit Profile
                                                if (window.location.hash === "#profile-edit") {
                                                    // Gunakan Bootstrap Tab untuk mengaktifkan tab sesuai dengan ID
                                                    let tab = new bootstrap.Tab(document.querySelector('button[data-bs-target="#profile-edit"]'));
                                                    tab.show();
                                                }
                                            });
                                        </script>
                                    @endif
                                    <!-- Profile Edit Form -->
                                    <form action="{{ route('profile.save') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <input type="hidden" name="id" value="{{ $guru->id ?? '' }}">
                                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">

                                        <div class="row mb-3">
                                            <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile
                                                Image</label>
                                            <div class="col-md-8 col-lg-9">
                                                <div
                                                    style="width: 150px; height: 150px; overflow: hidden; border-radius: 50%;">
                                                    @if (isset($guru) && $guru->photo)
                                                        <img src="{{ asset('storage/' . $guru->photo) }}"
                                                            alt="{{ $user->name }}"
                                                            style="width: 100%; height: 100%; object-fit: cover;">
                                                    @else
                                                        <img src="{{ asset('storage/default-image.jpg') }}"
                                                            alt="Default Image"
                                                            style="width: 100%; height: 100%; object-fit: cover;">
                                                    @endif
                                                </div>
                                                <div class="pt-2">
                                                    <input type="file" name="photo" class="btn btn-primary btn-sm"
                                                        title="Upload new profile image">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                                            <div class="col-md-8 col-lg-9">
                                                <textarea name="about" class="form-control" id="about" style="height: 100px">{{ $guru->about ?? '' }}</textarea>
                                            </div>
                                        </div>


                                        <div class="row mb-3">
                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full
                                                Name</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="name" type="text" class="form-control" id="fullName"
                                                    value="{{ $guru->name ?? '' }}" required>
                                            </div>
                                        </div>


                                        <div class="row mb-3">
                                            <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="email" type="email" class="form-control" id="email"
                                                    value="{{ $guru->email ?? '' }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="phone" class="col-md-4 col-lg-3 col-form-label">Phone
                                                Number</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="phone_number" type="text" class="form-control"
                                                    id="phone" value="{{ $guru->phone_number ?? '' }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="schoolName" class="col-md-4 col-lg-3 col-form-label">School
                                                Name</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="school_name" type="text" class="form-control"
                                                    id="schoolName" value="{{ $guru->school_name ?? '' }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="nuptk" class="col-md-4 col-lg-3 col-form-label">NUPTK</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="nuptk" type="text" class="form-control" id="nuptk"
                                                    value="{{ $guru->nuptk ?? '' }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="birthDate" class="col-md-4 col-lg-3 col-form-label">Birth
                                                Date</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="birth_date" type="date" class="form-control"
                                                    id="birthDate"
                                                    value="{{ $guru && \Carbon\Carbon::hasFormat($guru->birth_date, 'Y-m-d') ? \Carbon\Carbon::parse($guru->birth_date)->format('Y-m-d') : '' }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="birthPlace" class="col-md-4 col-lg-3 col-form-label">Birth
                                                Place</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="birth_place" type="text" class="form-control"
                                                    id="birthPlace" value="{{ $guru->birth_place ?? '' }}">
                                            </div>
                                        </div>


                                        <div class="row mb-3">
                                            <label for="'NiceAdmin/address"
                                                class="col-md-4 col-lg-3 col-form-label">Address</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="address" type="text" class="form-control" id="address"
                                                    value="{{ $guru->address ?? '' }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="village" class="col-md-4 col-lg-3 col-form-label">Village</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="village" type="text" class="form-control" id="village"
                                                    value="{{ $guru->village ?? '' }}">
                                            </div>
                                        </div>
                                        {{-- AUTO LIST --}}

                                        <div class="row mb-3">
                                            <label for="province"
                                                class="col-md-4 col-lg-3 col-form-label">Province</label>
                                            <div class="col-md-8 col-lg-9">
                                                <select name="province" id="province" class="form-control">
                                                    <option value="">Select Province</option>
                                                    @foreach ($provinces as $province)
                                                        <option value="{{ $province->id }}"
                                                            {{ $guru && $guru->province == $province->name ? 'selected' : '' }}>
                                                            {{ $province->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="city" class="col-md-4 col-lg-3 col-form-label">City</label>
                                            <div class="col-md-8 col-lg-9">
                                                <select name="city" id="city" class="form-control">
                                                    <option value="">Select City</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="district"
                                                class="col-md-4 col-lg-3 col-form-label">District</label>
                                            <div class="col-md-8 col-lg-9">
                                                <select name="district" id="district" class="form-control">
                                                    <option value="">Select District</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="row mb-3">
                                            <label for="lastEducation" class="col-md-4 col-lg-3 col-form-label">Last
                                                Education</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="last_education" type="text" class="form-control"
                                                    id="lastEducation" value="{{ $guru->last_education ?? '' }}">
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form><!-- End Profile Edit Form -->


                                </div>

                                <div class="tab-pane fade pt-3" id="profile-settings">

                                    <!-- Settings Form -->
                                    <form>

                                        <div class="row mb-3">
                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email
                                                Notifications</label>
                                            <div class="col-md-8 col-lg-9">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="changesMade"
                                                        checked>
                                                    <label class="form-check-label" for="changesMade">
                                                        Changes made to your account
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="newProducts"
                                                        checked>
                                                    <label class="form-check-label" for="newProducts">
                                                        Information on new products and services
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="proOffers">
                                                    <label class="form-check-label" for="proOffers">
                                                        Marketing and promo offers
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="securityNotify"
                                                        checked disabled>
                                                    <label class="form-check-label" for="securityNotify">
                                                        Security alerts
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form><!-- End settings Form -->

                                </div>

                                <div class="tab-pane fade pt-3" id="profile-change-password">
                                    <!-- Change Password Form -->


                                    <form action="{{ route('change.password') }}" method="POST">
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

                                        <div class="row mb-3">
                                            <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current
                                                Password</label>
                                            <div class="col-md-8 col-lg-9 position-relative">
                                                <input name="password" type="password" class="form-control"
                                                    id="currentPassword" required>
                                                <i class="bi bi-eye-slash password-toggle" id="toggleCurrentPassword"></i>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New
                                                Password</label>
                                            <div class="col-md-8 col-lg-9 position-relative">
                                                <input name="newpassword" type="password" class="form-control"
                                                    id="newPassword" required>
                                                <i class="bi bi-eye-slash password-toggle" id="toggleNewPassword"></i>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter
                                                New Password</label>
                                            <div class="col-md-8 col-lg-9 position-relative">
                                                <input name="newpassword_confirmation" type="password"
                                                    class="form-control" id="renewPassword" required>
                                                <i class="bi bi-eye-slash password-toggle" id="toggleRenewPassword"></i>
                                            </div>
                                        </div>


                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Change Password</button>
                                        </div>
                                    </form><!-- End Change Password Form -->
                                </div>


                            </div><!-- End Bordered Tabs -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->


    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('NiceAdmin/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('NiceAdmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('NiceAdmin/assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('NiceAdmin/assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('NiceAdmin/assets/vendor/quill/quill.js') }}"></script>
    <script src="{{ asset('NiceAdmin/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('NiceAdmin/assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('NiceAdmin/assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('NiceAdmin/assets/js/main.js') }}"></script>

    {{--  AUTO LIS SCIRPT  --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#province').on('change', function() {
                var provinceId = $(this).val();
                if (provinceId) {
                    $.ajax({
                        url: '/get-regencies', // Sesuaikan URL dengan rute di web.php
                        type: 'GET',
                        data: {
                            province_id: provinceId
                        },
                        success: function(data) {
                            $('#city').empty();
                            $('#city').append('<option value="">Select City</option>');
                            $.each(data, function(key, value) {
                                $('#city').append('<option value="' + value.id + '">' +
                                    value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#city').empty();
                    $('#district').empty();
                }
            });

            $('#city').on('change', function() {
                var cityId = $(this).val();
                if (cityId) {
                    $.ajax({
                        url: '/get-districts', // Sesuaikan URL dengan rute di web.php
                        type: 'GET',
                        data: {
                            regency_id: cityId
                        },
                        success: function(data) {
                            $('#district').empty();
                            $('#district').append('<option value="">Select District</option>');
                            $.each(data, function(key, value) {
                                $('#district').append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#district').empty();
                }
            });
        });
    </script>
    {{-- konfirmasi password --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const newPassword = document.getElementById('newPassword');
            const renewPassword = document.getElementById('renewPassword');

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


@endsection
