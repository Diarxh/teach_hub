<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\MemberCourse;
use App\Models\Pelatihan;
use App\Models\TipePelatihan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
// use Illuminate\Support\Facades\Auth;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;

class UserController extends Controller
{
    public function showProfile()
    {
        $provinces = Province::all();
        $user = Auth::user();
        $guru = Guru::where('user_id', $user->id)->first();
        $roles = $user->roles;

        return view('user.detail_profile', compact('provinces', 'guru', 'roles', 'user'));
    }
    public function getRegencies(Request $request)
    {
        $regencies = Regency::where('province_id', $request->province_id)->get();
        return response()->json($regencies);
    }

    public function getDistricts(Request $request)
    {
        $districts = District::where('regency_id', $request->regency_id)->get();
        return response()->json($districts);
    }

    // PROFILL

    public function detail_profile()
    {
        $guru = Guru::where('user_id', Auth::id())->first();
        if (!$guru) {
            return view('user.detail_profile')->with('alert', 'Anda belum memiliki data guru. Silakan lengkapi data Anda.');
        }
        return view('user.detail_profile', compact('guru'));
    }

    public function profile()
    {
        $teacher = Guru::where('User_Id', Auth::user()->id)->first();
        return view('user.detail_profile', compact('teacher'));
    }

    // public function showProfile()
    // {
    //     $guru = Guru::where('user_id', Auth::id())->first();
    //     $user = Auth::user();
    //     $roles = $user->roles;
    //     // $provinces = Province::pluck('name', 'id');

    //     return view('user.detail_profile', compact('user', 'roles', 'guru', 'provinces'));
    // }



    public function updateprofile()
    {
        // Mengambil data profil guru berdasarkan User_Id yang sedang login
        $profile = Guru::where('User_Id', Auth::user()->id)->first();

        // Mengembalikan view edit_profile dengan data profil
        return view('user.edit_profile', compact('profile'));
    }


    public function editProfile()
    {
        // Cek apakah guru sudah ada
        $guru = Guru::where('user_id', Auth::id())->first();

        // Jika tidak ada, buat objek baru untuk form
        if (!$guru) {
            $guru = new Guru();
        }

        return view('user.edit_profile', compact('guru'));
    }

    public function saveprofile(Request $request)
    {
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:255',
            'school_name' => 'required|string|max:255',
            'nuptk' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'birth_place' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'village' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'last_education' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'about' => 'nullable|string|max:1000',
        ]);

        // Menambahkan user_id ke data yang divalidasi
        $validatedData['user_id'] = Auth::id();

        // Menyimpan foto jika ada
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('profile_photos', 'public');
            $validatedData['photo'] = $photoPath;
        }

        // Mencari data guru berdasarkan user_id
        $guru = Guru::where('user_id', Auth::id())->first();

        // Jika data guru ditemukan, lakukan update
        if ($guru) {
            $guru->update($validatedData);
            $message = 'Profil berhasil diperbarui';
        } else {
            // Jika tidak ditemukan, buat data baru
            Guru::create($validatedData);
            $message = 'Profil berhasil dibuat';
        }

        // Redirect ke rute profil dengan pesan sukses
        return redirect()->route('profile.show')->with('success', $message);
    }
    public function changePassword(Request $request)
    {
        // Validasi input
        $request->validate([
            'password' => 'required|string|min:3',
            'newpassword' => 'required|string|min:3|confirmed',
        ]);

        // Cek apakah password saat ini benar
        $user = Auth::user();
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Password saat ini tidak sesuai.']);
        }

        // Update password
        $user->password = Hash::make($request->newpassword);
        $user->save();

        // Redirect ke route profile
        return redirect()->route('profile.show')->with('success', 'Password berhasil diubah.');
    }


    // END PROFILE
}