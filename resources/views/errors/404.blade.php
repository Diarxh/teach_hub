@extends('theme')

@section('content')
    <div class="py-5 container-fluid d-flex flex-column align-items-center justify-content-center"
        style="min-height: calc(100vh - 200px);">
        <div class="text-center error-container">
            <div class="card error-card">
                <div class="image-container wow fadeInUp" data-wow-delay="0.3s">
                    <img src="images/error.svg" alt="Gambar" class="image"
                        style="max-width: 50%; height: auto; display: block; margin: 0 auto;">
                </div>
                <div class="card-body">
                    <h1 class="mt-4 display-1 text-gradient font-weight-bold shape">404 Not Found</h1>
                    <p class="mt-4 mb-4 lead">Halaman yang Anda cari tidak ditemukan.</p>
                    <a href="{{ url('/') }}" class="btn btn-primary btn-lg rounded-pill btn-custom">Kembali ke
                        Beranda</a>
                </div>
            </div>
        </div>
    </div>

    <style>
        .error-card {
            max-width: 500px;
            /* Membatasi lebar kartu */
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .shape {
            padding: 5px;
            margin-top: 2px;
            border: 2px solid #007bff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            display: inline-block;
            background: linear-gradient(45deg, #007bff, #00ff88);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .btn-custom {
            background-color: #c911cf;
            color: white;
            padding: 12px 24px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #0069d9;
        }

        /* Tambahkan CSS rule untuk membuat tampilan responsive */
        @media (max-width: 768px) {
            .error-card {
                max-width: 300px;
                padding: 1.5rem;
            }

            .image-container img {
                max-width: 100%;
            }
        }

        @media (max-width: 480px) {
            .error-card {
                max-width: 200px;
                padding: 1rem;
            }

            .image-container img {
                max-width: 100%;
            }

            .btn-custom {
                padding: 8px 16px;
            }
        }
    </style>
@endsection
