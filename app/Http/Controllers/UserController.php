<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Mengambil data kota berdasarkan ID provinsi.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getRegencies(Request $request)
    {
        $cities = Regency::where('province_id', $request->province_id)->get();
        return response()->json($cities);
    }

    /**
     * Mengambil data kecamatan berdasarkan ID kota.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDistricts(Request $request)
    {
        $districts = District::where('regency_id', $request->regency_id)->get();
        return response()->json($districts);
    }

    /**
     * Menampilkan halaman profil pengguna.
     *
     * @return \Illuminate\View\View
     */
    public function showProfile()
    {
        $provinces = Province::all();
        $user = Auth::user();
        $guru = Teacher::where('user_id', $user->id)->first();
        $roles = $user->roles;

        return view('user.detail_profile', compact('provinces', 'guru', 'roles', 'user'));
    }

    /**
     * Menampilkan halaman detail profil pengguna.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function detail_profile()
    {
        try {
            $guru = Teacher::where('user_id', Auth::id())->first();
            $user = Auth::user();

            if (!$guru) {
                return view('user.detail_profile', [
                    'guru' => null,
                    'user' => $user,
                    'alert' => 'Anda belum memiliki data guru. Silakan lengkapi data Anda.',
                ]);
            }

            return view('user.detail_profile', compact('guru', 'user'));
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Menampilkan halaman edit profil pengguna.
     *
     * @return \Illuminate\View\View
     */
    public function editProfile()
    {
        $guru = Teacher::where('user_id', Auth::id())->first();

        if (!$guru) {
            $guru = new Teacher();
        }

        return view('user.edit_profile', compact('guru'));
    }

    /**
     * Menyimpan profil pengguna.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function saveprofile(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:255',
            'school_name' => 'required|string|max:255',
            'nuptk' => 'required|string|max:255',
            'birth_date' => 'required|date', // Pastikan ini menggunakan tipe date
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

        // Tidak perlu konversi ulang jika input HTML sudah dalam format Y-m-d
        $validatedData['user_id'] = Auth::id();

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('profile_photos', 'public');
            $validatedData['photo'] = $photoPath;
        }

        $guru = Teacher::where('user_id', Auth::id())->first();

        if ($guru) {
            $guru->update($validatedData);
            $message = 'Profil berhasil diperbarui';
        } else {
            Teacher::create($validatedData);
            $message = 'Profil berhasil dibuat';
        }

        return redirect()->route('profile.show')->with('success', $message);
    }



    /**
     * Mengubah kata sandi pengguna.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:3',
            'newpassword' => 'required|string|min:3|confirmed',
        ]);

        $user = Auth::user();
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Password saat ini tidak sesuai.']);
        }

        $user->password = Hash::make($request->newpassword);
        $user->save();

        return redirect()->route('profile.show')->with('success', 'Password berhasil diubah.');
    }
}