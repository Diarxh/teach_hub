@extends('user.theme')

@section('styles')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

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
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
        <div class="container py-5 text-center" style="max-width: 900px;">
            <h3 class="display-3 wow fadeInDown mb-4" data-wow-delay="0.1s">Pelatihan</h3>
        </div>
    </div>
    <!-- Header End -->

    <!-- Blog Start -->
    <div class="container-fluid blog py-5">
        <div class="container py-5">
            <div class="wow fadeInUp mx-auto mb-5 text-center" data-wow-delay="0.1s" style="max-width: 900px;">
                <h4 class="text-primary">TeachHub</h4>
                <h1 class="display-5 mb-4">Confirm Pelatihan</h1>
            </div>
            <div class="d-flex justify-content-center">
                <div class="card shadow-sm col-md-6 col-lg-6 col-xl-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="card-body">
                        @if ($status == 'terdaftar')
                            <script>
                                Swal.fire({
                                    title: 'Anda Sudah Terdaftar',
                                    icon: 'info',
                                    confirmButtonText: 'OK'
                                });
                            </script>
                        @elseif (session('success'))
                            <script>
                                Swal.fire({
                                    title: 'Berhasil!',
                                    text: '{{ session('success') }}',
                                    icon: 'success',
                                    confirmButtonText: 'OK'
                                });
                            </script>
                        @endif
                        @if ($status == 'terdaftar')
                            <p class="text-center">Anda Sudah Terdaftar</p>
                        @else
                            <div class="text-center">
                                <img src="{{ asset('theme/img/blog-1.png') }}" alt="{{ $course->name }}"
                                    class="img-fluid rounded mb-4" style="max-height: 300px;">
                            </div>
                            <p class="text-center">Nama Pelatihan : <span>{{ $course->name }}</span></p>
                            <form action="/registercourse-do" method="POST" class="container mt-4">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <input type="hidden" class="form-control" id="user_id" name="user_id"
                                            value="{{ $user }}" readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <input type="hidden" class="form-control" id="pelatihan_id" name="pelatihan_id"
                                            value="{{ $course->id }}" readonly>
                                    </div>
                                </div>
                                <div class="form-check mb-3">
                                    <input type="checkbox" class="form-check-input" id="check" name="check"
                                        onclick="toggleSubmitButton()">
                                    <label class="form-check-label" for="check">Dengan ini menyetujui untuk
                                        mendaftar</label>
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary" id="submitBtn" disabled>Daftar</button>
                                </div>
                                <script>
                                    function toggleSubmitButton() {
                                        const checkbox = document.getElementById('check');
                                        const submitBtn = document.getElementById('submitBtn');
                                        submitBtn.disabled = !checkbox.checked; // Enable/Disable button based on checkbox state
                                    }



                                    document.getElementById('registrationForm').addEventListener('submit', function(e) {
                                        e.preventDefault(); // Mencegah pengiriman form default
                                        Swal.fire({
                                            title: '{{ __('Konfirmasi Pendaftaran') }}',
                                            text: "{{ __('Anda yakin ingin mendaftar pelatihan ini?') }}",
                                            icon: 'question',
                                            showCancelButton: true,
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: '#d33',
                                            confirmButtonText: '{{ __('Ya, Daftar!') }}',
                                            cancelButtonText: '{{ __('Batal') }}'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                Swal.fire({
                                                    title: '{{ __('Memproses...') }}',
                                                    text: '{{ __('Mohon tunggu sebentar.') }}',
                                                    allowOutsideClick: false,
                                                    showConfirmButton: false,
                                                    willOpen: () => {
                                                        Swal.showLoading();
                                                    }
                                                });
                                                this.submit(); // Kirim form setelah konfirmasi
                                            }
                                        });
                                    });
                                </script>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->
@endsection
