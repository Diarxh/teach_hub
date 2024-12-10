<?php

namespace App\Http\Controllers;

use App\Models\MemberCourse;
use App\Models\Teacher;
use App\Models\Training;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserDashboardController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $guru = Teacher::where('user_id', $user->id)->first();
        $roles = $user->roles;
        $totalPelatihan = Training::count();
        $pelatihanSaya = MemberCourse::where('user_id', Auth::id())->count();
        $penggunaAktif = User::count();

        // Ambil pelatihan terbaru yang diikuti oleh pengguna
        $recentPelatihan = MemberCourse::with('Training')
            ->where('user_id', Auth::id())
            ->latest()
            ->take(5)
            ->get();

        // Hitung jumlah pelatihan berdasarkan bulan
        $monthlyTrainingCounts = MemberCourse::select(DB::raw('COUNT(*) as total, MONTH(created_at) as month, YEAR(created_at) as year'))
            ->where('user_id', Auth::id())
            ->groupBy(DB::raw('YEAR(created_at), MONTH(created_at)'))
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();

        // Persiapkan data untuk chart
        $labels = [];
        $data = [];
        foreach ($monthlyTrainingCounts as $entry) {
            // Format bulan dan tahun ke bentuk yang lebih menarik
            $labels[] = date('F Y', strtotime("{$entry->year}-{$entry->month}-01"));
            $data[] = $entry->total; // Jumlah pelatihan
        }

        return view('user.dashboard_user', compact('user', 'guru', 'roles', 'totalPelatihan', 'pelatihanSaya', 'penggunaAktif', 'recentPelatihan', 'labels', 'data'));
    }
}