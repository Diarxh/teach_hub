<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Pengalihan berdasarkan peran
            if ($user->hasRole('super_admin')) {
                // Super admin diarahkan ke /admin
                return redirect()->intended('/admin');
            } elseif ($user->hasRole('perusahaan')) {
                // Perusahaan diarahkan ke /admin/initial-company-setup
                return redirect()->intended('/admin/initial-company-setup');
            } elseif ($user->hasRole('guru')) {
                // Guru diarahkan ke dashboard pengguna
                return redirect()->intended('/user/dashboard');
            } else {
                Auth::logout();
                return back()->withErrors([
                    'role' => 'Akses ditolak. Anda tidak memiliki peran yang sesuai.',
                ]);
            }
        }

        return back()->withErrors([
            'email' => 'Kredensial yang diberikan tidak cocok dengan catatan kami.',
        ]);
    }


    public function logout(Request $request)
    {
        // Logout the user
        Auth::logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the session token to prevent CSRF attacks
        $request->session()->regenerateToken();

        // Redirect to homepage or any other page after logout
        return redirect('/home');
    }

    public function register(Request $request)
    {
        // Jalankan validasi
        $this->validator($request->all())->validate();

        // Buat pengguna baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Assign the role to the user
        $role = Role::findByName('guru');  // Ganti 'guru' sesuai kebutuhan
        $user->assignRole($role);

        // Set session success message
        session()->flash('success', 'Pendaftaran berhasil. Silakan login.');

        return redirect()->route('login');  // Redirect ke halaman login
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'], // Pastikan email unik
            'password' => ['required', 'string', 'min:2', 'confirmed'],
        ]);
    }

    // REGISTRASI COMPANY
    public function showCompanyRegisterForm()
    {
        return view('register_company');  // Pastikan ada view `register_company.blade.php`
    }

    public function registerCompany(Request $request)
    {
        // Jalankan validasi
        $this->validator($request->all())->validate();

        // Buat pengguna baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Assign peran 'perusahaan' ke pengguna
        $role = Role::findByName('perusahaan');  // Pastikan 'perusahaan' adalah nama role yang benar
        $user->assignRole($role);

        // Set session success message
        session()->flash('success', 'Pendaftaran perusahaan berhasil. Silakan login.');

        return redirect()->route('login');  // Redirect ke halaman login
    }

}