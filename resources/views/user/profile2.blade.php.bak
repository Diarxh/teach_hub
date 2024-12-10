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
        <div class="container py-5 text-center" style="max-width: 900px;">
            <h3 class="display-3 wow fadeInDown mb-4" data-wow-delay="0.1s">Profil Pengguna
                </h1>
                {{-- <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">list Pelatihan</a></li>
                        <li class="breadcrumb-item active text-primary"></li>
                    </ol>     --}}
        </div>
    </div>

<section class="section profile">
  <div class="row">
    <div class="col-xl-4">

      <div class="card">
        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

          <img src="{{ asset('theme/img/testimonial-img-3.jpg')}}" alt="Profile" class="rounded-circle">
          <h2>Kevin Anderson</h2>
          <h3>Web Designer</h3>
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

      <div class="card">
        <div class="card-body pt-3">
          <!-- Bordered Tabs -->
          <ul class="nav nav-tabs nav-tabs-bordered">

            <li class="nav-item">
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
            </li>

          </ul>
          <div class="tab-content pt-2">
            @if(isset($guru))
                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                    <h5 class="card-title">About</h5>
                    <p class="small fst-italic">{{ $guru->about ?? 'Informasi tentang guru belum tersedia.' }}</p>

                    <h5 class="card-title">Profile Details</h5>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Full Name</div>
                        <div class="col-lg-9 col-md-8">{{ $guru->name }}</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">School</div>
                        <div class="col-lg-9 col-md-8">{{ $guru->school_name }}</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">NUPTK</div>
                        <div class="col-lg-9 col-md-8">{{ $guru->nuptk }}</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Birth</div>
                        <div class="col-lg-9 col-md-8">{{ $guru->birth_place }}, {{ $guru->birth_date }}</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Address</div>
                        <div class="col-lg-9 col-md-8">
                            {{ $guru->address }}, {{ $guru->village }}, {{ $guru->district }},
                            {{ $guru->city }}, {{ $guru->province }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Phone</div>
                        <div class="col-lg-9 col-md-8">{{ $guru->phone_number }}</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Email</div>
                        <div class="col-lg-9 col-md-8">{{ $guru->email }}</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Education</div>
                        <div class="col-lg-9 col-md-8">{{ $guru->last_education }}</div>
                    </div>
                </div>
            @else
                <div class="alert alert-warning">
                    Data guru tidak ditemukan. Silakan lengkapi profil Anda.
                </div>
            @endif
        </div>




        <!-- Profile Edit Form -->
        <form action="{{ route('saveprofile') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $guru->id ?? '' }}">
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">

            <!-- Menampilkan Pesan Kesalahan -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif



                <div class="row mb-3">
                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                    <div class="col-md-8 col-lg-9">
                        <img src="{{ asset('uploads/' . ($guru->photo ?? 'default.jpg')) }}" alt="Profile" class="img-fluid">
                        <div class="pt-2">
                            <input type="file" name="photo" class="btn btn-primary btn-sm" title="Upload new profile image">
                            @if($guru->photo ?? false)
                                <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                    <div class="col-md-8 col-lg-9">
                        <input name="name" type="text" class="form-control" id="fullName" value="{{ old('name', $guru->name ?? '') }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                    <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="Email" value="{{ $guru->email ?? '' }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                    <div class="col-md-8 col-lg-9">
                        <input name="phone_number" type="text" class="form-control" id="Phone" value="{{ $guru->phone_number ?? '' }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="school" class="col-md-4 col-lg-3 col-form-label">School</label>
                    <div class="col-md-8 col-lg-9">
                        <input name="school_name" type="text" class="form-control" id="school" value="{{ $guru->school_name ?? '' }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="nuptk" class="col-md-4 col-lg-3 col-form-label">NUPTK</label>
                    <div class="col-md-8 col-lg-9">
                        <input name="nuptk" type="text" class="form-control" id="nuptk" value="{{ $guru->nuptk ?? '' }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                    <div class="col-md-8 col-lg-9">
                        <input name="address" type="text" class="form-control" id="Address" value="{{ $guru->address ?? '' }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="birthDate" class="col-md-4 col-lg-3 col-form-label">Birth Date</label>
                    <div class="col-md-8 col-lg-9">
                        <input name="birth_date" type="date" class="form-control" id="birthDate" value="{{ old('birth_date', $guru->birth_date ?? '') }}">
                    </div>
                </div>


                <div class="row mb-3">
                    <label for="birthPlace" class="col-md-4 col-lg-3 col-form-label">Birth Place</label>
                    <div class="col-md-8 col-lg-9">
                        <input name="birth_place" type="text" class="form-control" id="birthPlace" value="{{ $guru->birth_place ?? '' }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="village" class="col-md-4 col-lg-3 col-form-label">Village</label>
                    <div class="col-md-8 col-lg-9">
                        <input name="village" type="text" class="form-control" id="village" value="{{ $guru->village ?? '' }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="district" class="col-md-4 col-lg-3 col-form-label">District</label>
                    <div class="col-md-8 col-lg-9">
                        <input name="district" type="text" class="form-control" id="district" value="{{ $guru->district ?? '' }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="city" class="col-md-4 col-lg-3 col-form-label">City</label>
                    <div class="col-md-8 col-lg-9">
                        <input name="city" type="text" class="form-control" id="city" value="{{ $guru->city ?? '' }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="province" class="col-md-4 col-lg-3 col-form-label">Province</label>
                    <div class="col-md-8 col-lg-9">
                        <input name="province" type="text" class="form-control" id="province" value="{{ $guru->province ?? '' }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="education" class="col-md-4 col-lg-3 col-form-label">Last Education</label>
                    <div class="col-md-8 col-lg-9">
                        <input name="last_education" type="text" class="form-control" id="education" value="{{ $guru->last_education ?? '' }}">
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
                  <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                  <div class="col-md-8 col-lg-9">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="changesMade" checked>
                      <label class="form-check-label" for="changesMade">
                        Changes made to your account
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="newProducts" checked>
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
                      <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
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
              <form>

                <div class="row mb-3">
                  <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="password" type="password" class="form-control" id="currentPassword">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="newpassword" type="password" class="form-control" id="newPassword">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="renewpassword" type="password" class="form-control" id="renewPassword">
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


<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/chart.js/chart.umd.js"></script>
<script src="assets/vendor/echarts/echarts.min.js"></script>
<script src="assets/vendor/quill/quill.js"></script>
<script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="assets/vendor/tinymce/tinymce.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>


@endsection
