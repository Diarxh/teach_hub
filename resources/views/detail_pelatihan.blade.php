@extends('user.theme')
@section('content')
    <div class="py-2 container-fluid bg-breadcrumb">
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
            <h3 class="mb-4 display-3 wow fadeInDown" data-wow-delay="0.1s">Detail Pelatihan</h1>
                <ol class="mb-0 breadcrumb justify-content-center wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">pelatihan</a></li>
                    <li class="breadcrumb-item active text-primary">detail_pelatihan</li>
                </ol>
        </div>
    </div>
    <!-- Header End -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3 card wow fadeInLeft" data-wow-delay="0.2s">
                    @if ($detail->photo)
                        <img src="{{ asset('storage/' . $detail->photo) }}" alt="{{ $detail->name }}" class="card-img-top"
                            style="width: 100%; height: auto;">
                    @else
                        <img src="{{ asset('theme/img/blog-1.png') }}" alt="Pelatihan Guru" class="card-img-top">
                    @endif

                    {{-- <img src="{{ asset('storage/' . $detail->photo) }}" alt="{{ $data->trainer_type_name }}"
                    class="card-img-top" style="max-height: 100%; width: 100%; object-fit: cover;"> --}}
                    <div class="card-body">
                        <h5 class="card-title">{{ $detail->name }}</h5>
                        @if ($detail->tipe_pelatihan)
                            <p class="card-text">Tipe Pelatihan: {{ $detail->tipe_pelatihan->name }}</p>
                        @else
                            <p class="card-text">Tipe Pelatihan: Tidak tersedia</p>
                        @endif
                        <button
                            onclick="showRegistrationConfirm(
                            {{ $detail->id }},
                            '{{ $detail->name }}',
                            '{{ $detail->photo }}',
                            '{{ $detail->training_location }}'
                        )"
                            class="btn btn-primary">
                            Daftar Pelatihan
                        </button>

                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="mb-3 card wow fadeInRight" data-wow-delay="0.4s">
                    <div class="card-body">
                        <h5 class="card-title">Jadwal Pelatihan</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{!! $detail->description !!}</li>
                            <li class="list-group-item">Tanggal:
                                {{ \Carbon\Carbon::parse($detail->start_date)->translatedFormat('l, d F Y') }} -
                                {{ \Carbon\Carbon::parse($detail->end_date)->translatedFormat('l, d F Y') }}</li>
                            <li class="list-group-item">Status: {{ $detail->status }}</li>
                            <li class="list-group-item">Lokasi: {{ $detail->training_location }}</li>
                        </ul>
                    </div>
                </div>
                <div class="participants-section">
                    <h5 class="participants-title">Daftar Peserta</h5>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Sekolah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($peserta->isEmpty())
                                <tr>
                                    <td colspan="4">Tidak ada peserta yang terdaftar.</td>
                                </tr>
                            @else
                                @foreach ($peserta as $index => $p)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $p->user_name ?? '-' }}</td> <!-- Menggunakan user_name -->
                                        <td>{{ $p->email ?? '-' }}</td>
                                        <td>{{ $p->school_name ?? '-' }}</td> <!-- Pastikan kolom ini ada -->
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        function showRegistrationConfirm(trainingId, trainingName) {
            const userId = '{{ Auth::id() }}';

            // Periksa apakah pengguna sudah login
            if (!userId) {
                Swal.fire({
                    title: 'Gagal!',
                    text: 'Silakan login terlebih dahulu untuk mendaftar.',
                    icon: 'error',
                }).then(() => {
                    window.location.href = '{{ route('login') }}'; // Redirect ke halaman login
                });
                return; // Hentikan eksekusi function jika belum login
            }

            Swal.fire({
                title: 'Konfirmasi Pendaftaran Pelatihan',
                html: `
                    <div class="text-left">
                        <p class="mb-3">Nama Pelatihan: ${trainingName}</p>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="agreementCheck">
                            <label class="form-check-label" for="agreementCheck">
                                Dengan ini saya menyetujui untuk mendaftar
                            </label>
                        </div>
                    </div>
                `,
                showCancelButton: true,
                confirmButtonText: 'Daftar',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                showLoaderOnConfirm: true,
                preConfirm: () => {
                    const isChecked = document.getElementById('agreementCheck').checked;
                    if (!isChecked) {
                        Swal.showValidationMessage('Silakan setujui persyaratan terlebih dahulu');
                        return false;
                    }

                    return fetch(`/registercourse-do`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                training_id: trainingId,
                                user_id: userId
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.status === 'error') {
                                throw new Error(data.message);
                            }
                            return data;
                        });
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Berhasil!',
                        text: 'Anda telah berhasil mendaftar pelatihan',
                        icon: 'success'
                    }).then(() => {
                        window.location.href = '{{ route('pelatihan_saya') }}';
                    });
                }
            }).catch(error => {
                Swal.fire({
                    title: 'Error!',
                    text: error.message,
                    icon: 'error'
                });
            });
        }
    </script>


@endsection
