@extends('user.theme')

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
        </ul>
        <div class="container py-6 mt-5 text-center" style="max-width: 1000px;">
            <h3 class="display-3 wow fadeInDown mb-4" data-wow-delay="0.1s">Dashboard</h3>
        </div>
    </div>
    <!-- Header End -->

    <div class="container mt-5">
        <h2 class="mb-4">Pelatihan Saya</h2>
        @if ($pelatihan->isEmpty())
            <div class="alert alert-warning" role="alert">
                Anda belum mendaftar pelatihan apapun.
            </div>
            <script>
                // Menampilkan alert jika tidak ada pelatihan
                Swal.fire({
                    icon: 'warning',
                    title: 'Tidak Ada Pelatihan',
                    text: 'Anda belum mendaftar pelatihan apapun. Silakan daftar pelatihan terlebih dahulu.',
                    confirmButtonText: 'OK'
                }).then(() => {
                    // Setelah menutup alert, arahkan ke halaman daftar pelatihan
                    window.location.href = "{{ route('list_pelatihan') }}";
                });
            </script>
        @else
            <div class="row justify-content-center">


                @foreach ($pelatihan as $item)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card shadow-sm border-light">
                            @if ($item->photo)
                                <img src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->Training->name }}"
                                    class="card-img-top" loading="lazy">
                            @else
                                <div class="placeholder-img">
                                    <i class="fas fa-chalkboard-teacher"></i>
                                </div>
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->Training->name }}</h5>
                                <p class="card-text"><strong>Tanggal:</strong> {{ $item->Training->start_date }} -
                                    {{ $item->Training->end_date }}</p>
                                <p class="card-text"><strong>Lokasi:</strong> {{ $item->Training->training_location }}</p>
                                <a href="/detail_pelatihan/{{ $item->Training->id }}" class="btn btn-primary">Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Registrasi Berhasil!',
                text: '{{ session('success') }}',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Scroll ke tengah daftar pelatihan saat halaman dimuat
        window.onload = function() {
            const pelatihanSection = document.querySelector('.container.mt-5');
            const offset = pelatihanSection.offsetTop; // Ambil posisi atas elemen
            window.scrollTo({
                top: offset - window.innerHeight / 2 + pelatihanSection.clientHeight / 2, // Scroll ke tengah
                behavior: 'smooth' // Animasi scroll
            });
        };
    </script>

    <style>
        .placeholder-img {
            width: 100%;
            height: 200px;
            /* Atur tinggi sesuai kebutuhan */
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f0f0f0;
            /* Warna latar belakang */
            border: 1px dashed #ccc;
            /* Garis putus-putus */
            border-radius: 5px;
            /* Sudut melengkung */
        }

        .placeholder-img i {
            font-size: 50px;
            /* Ukuran ikon */
            color: #aaa;
            /* Warna ikon */
        }
    </style>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
