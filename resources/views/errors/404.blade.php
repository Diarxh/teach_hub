@extends('errors::minimal')

@section('content')
    <div class="container d-flex flex-column align-items-center" style="height: 100vh; justify-content: center;">
        <div class="card text-center" style="width: 100%; max-width: 600px; background-color: #f5f5f5; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
            <div class="card-body p-4">
                <div style="margin-bottom: 20px;">
                    <img
                        src="{{ asset('images/error-404.svg') }}"
                        alt="Error 404"
                        class="img-fluid animated-image"
                        style="max-width: 100%; height: auto;">
                </div>
                <h2 class="mb-3">Error 404</h2>
                <p>Halaman yang Anda cari tidak ditemukan.</p>
                <p>Coba periksa URL atau kembali ke halaman utama.</p>
                <p>Jika Anda masih mengalami masalah, silakan hubungi kami melalui email
                    <a href="mailto:example@example.com">example@example.com</a>.
                </p>
                <div class="d-flex justify-content-center mt-4">
                    <button class="btn btn-primary me-2" onclick="history.back()">Kembali</button>
                    <button class="btn btn-secondary" onclick="window.location.href='/home'">Kembali ke Halaman Utama</button>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Animasi infinite untuk gambar */
        @keyframes float {
            0%, 100% {
                transform: translateY(0); /* Posisi awal */
            }
            50% {
                transform: translateY(-10px); /* Melayang ke atas */
            }
        }

        .animated-image {
            animation: float 3s ease-in-out infinite; /* Animasi terus-menerus */
        }
    </style>
@endsection
