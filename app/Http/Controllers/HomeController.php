<?php

namespace App\Http\Controllers;

// use App\Models\District;
use App\Models\MemberCourse;
use App\Models\Regency;
// use App\Models\Province;
use App\Models\Teacher;
use App\Models\Training;
use App\Models\TrainingType;
use App\Models\User;
use App\Models\Village;
use id;
use Illuminate\Http\Request;
// // // use Laravolt\Indonesia\Models\District;
// use Laravolt\Indonesia\Models\Village;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; // Tambahkan ini
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;


class HomeController extends Controller
{
    public function getCities($provinceId)
    {
        $cities = Regency::where('province_id', $provinceId)->pluck('name', 'id');
        return response()->json($cities);
    }

    public function getDistricts($cityId)
    {
        $districts = District::where('regency_id', $cityId)->pluck('name', 'id');
        return response()->json($districts);
    }

    public function getVillages($districtId)
    {
        $villages = Village::where('district_id', $districtId)->pluck('name', 'id');
        return response()->json($villages);
    }

    //home
    public function index()
    {

        if (Auth()->user() != null) {
            return redirect('user/dashboard');
        }
        $totalPelatihan = Training::count(); // Total semua pelatihan
        $pelatihanSaya = MemberCourse::where('user_id', Auth::id())->count(); // Hitung pelatihan yang diikuti oleh pengguna
        $penggunaAktif = User::count(); // Menghitung semua pengguna
        $recentPelatihan = Training::latest()->take(5)->get(); // Ambil 5 pelatihan terbaru
        $tipepelatihan = TrainingType::orderBy('trainer_type_name', 'asc')->get();
        $pelatihan = Training::query()
            ->latest()
            ->get(); // Pastikan untuk mengambil data dengan get()

        // Debug hasil query (jika diperlukan)
        // \Log::info($pelatihan);

        return view('home', compact('pelatihan', 'tipepelatihan', 'totalPelatihan', 'pelatihanSaya', 'penggunaAktif', 'recentPelatihan')); // Mengirimkan $pelatihan dan $tipepelatihan ke view
    }
    public function showRegistrationForm()
    {
        return view('register');
    }
    public function showLoginForm()
    {
        return view('login');
    }
    public function pelatihan_saya()
    {
        $id = auth()->id();
        $pelatihan = MemberCourse::select('member_courses.*', 'trainings.*')->join('trainings', 'member_courses.training_id', '=', 'trainings.id')->where('member_courses.user_id', $id)->get();

        return view('user.pelatihan_saya', compact('pelatihan'));
    }
    public function contact()
    {
        return view('contact');
    }

    public function about()
    {
        return view('about');
    }

    public function tipe_pelatihan()
    {
        $tipepelatihan = TrainingType::orderBy('trainer_type_name', 'asc')->get();

        return view('tipepelatihan', data: compact('tipepelatihan'));
    }

    public function pelatihan(Request $request)
    {
        // Ambil query pencarian dari form
        $search = $request->input('search');

        // Query pelatihan dengan pencarian jika ada, dan urutkan berdasarkan yang terbaru
        $pelatihan = Training::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            })
            ->latest()
            ->paginate(1); // Menampilkan 12 item per halaman

        // Kirim data pelatihan dan pencarian ke view
        return view('pelatihan', compact('pelatihan', 'search'));
    }

    public function detail_profile()
    {
        $user = Auth::user();
        $guru = Teacher::where('user_id', $user->id)->first();
        $roles = $user->roles; // Assuming you're using a roles relationship

        if (!$guru) {
            return view('user.detail_profile', compact('user', 'roles'))->with('alert', 'Anda belum memiliki data guru. Silakan lengkapi data Anda.');
        }

        return view('user.detail_profile', compact('user', 'guru', 'roles'));
    }

    public function detail_pelatihan(int $id)
    {
        $detail = Training::with('peserta.guru')->findOrFail($id);
        $peserta = MemberCourse::select('member_courses.*', 'users.name as user_name', 'users.email as email', 'teachers.*')->join('users', 'member_courses.user_id', '=', 'users.id')->leftJoin('teachers', 'users.id', '=', 'teachers.user_id')->where('member_courses.training_id', $id)->get();


        // $peserta = MemberCourse::with('guru')->where('training_id', $id)->get();
        // dd($peserta);
        return view('detail_pelatihan', compact('detail', 'peserta'));
    }
    // / TrainingController.php
    public function registercoursedo(Request $request)
    {
        try {
            // Cek apakah sudah terdaftar
            $existing = MemberCourse::where('user_id', $request->user_id)
                ->where('training_id', $request->training_id)
                ->first();

            if ($existing) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Anda sudah terdaftar di pelatihan ini',
                ], 400);
            }

            // Ambil teacher_id dari user yang sedang login
            $teacherId = Auth::user()->teacher_id; // Pastikan kolom teacher_id ada di model User

            // Buat pendaftaran baru
            MemberCourse::create([
                'training_id' => $request->training_id,
                'user_id' => $request->user_id,
                'teacher_id' => $teacherId, // Tambahkan teacher_id di sini
                'status' => 1,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil mendaftar pelatihan',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }

    // TERUNTUK nambah data ke table guru

}