<?php
// include (__DIR__ . '/../admin/partials/koneksi.php');  // Menyertakan file koneksi ke database
// session_start();  // Memulai sesi untuk menyimpan data pengguna yang login

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {  // Memeriksa apakah form dikirim menggunakan metode POST
//     $username = $_POST['email'];  // Mengambil nilai email dari form
//     $password = md5($_POST['password']);  // Mengambil dan mengenkripsi kata sandi menggunakan MD5

//     // Query untuk memeriksa username dan password yang dienkripsi
//     $query = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
//     $data = mysqli_query($koneksi, $query);  // Menjalankan query ke database

//     $cek = mysqli_num_rows($data);  // Menghitung jumlah baris yang cocok dengan query

//     if ($cek > 0) {  // Jika ada baris yang cocok
//         $data = mysqli_fetch_assoc($data);  // Mengambil data dari baris yang cocok
//         if ($data['level'] == 'admin') {  // Jika level pengguna adalah admin
//             $_SESSION['username'] = $username;  // Menyimpan username ke sesi
//             $_SESSION['status'] = 'login';  // Menyimpan status login ke sesi
//             echo "<script>
//                     if (window.top !== window.self) { // Memeriksa apakah halaman dimuat di dalam iframe
//                         window.top.location.href = '../admin/manage-admin.php'; // Mengarahkan ke halaman admin di jendela utama
//                     } else {
//                         window.location.href = '../admin/manage-admin.php'; // Mengarahkan ke halaman admin
//                     }
//                   </script>";
//         } elseif ($data['level'] == 'user') {  // Jika level pengguna adalah user
//             $_SESSION['email'] = $username;  // Menyimpan email ke sesi
//             $_SESSION['status'] = 'login';  // Menyimpan status login ke sesi
//             echo "<script>
//                     if (window.top !== window.self) { // Memeriksa apakah halaman dimuat di dalam iframe
//                         window.top.location.href = '../admin/indek.php'; // Mengarahkan ke halaman user di jendela utama
//                     } else {
//                         window.location.href = '../admin/indek.php'; // Mengarahkan ke halaman user
//                     }
//                   </script>";
//         }
//     } else {  // Jika tidak ada baris yang cocok
//         echo "<script>
//                 document.addEventListener('DOMContentLoaded', function() {
//                     Swal.fire({
//                         title: 'Username Atau Password Salah',
//                         text: 'Silakan coba lagi.',
//                         icon: 'error',
//                         confirmButtonText: 'OK'
//                     }).then((result) => {
//                         if (result.isConfirmed) {
//                             // window.location.href = '../index.php'; // Mengarahkan ke halaman index
//                         }
//                     });
//                 });
//               </script>";
//     }
// }
//
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> Animated Login Form - WD </title>
    <!-- <script type="module" src="./ionicons.esm.js"></script> -->
    <!-- <script nomodule src="./ionicons.js"></script> -->
    <!-- #SWEETALERT -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="{{ asset('theme/css/login.css') }}" rel="stylesheet">
</head>

<body>
    <!-- partial:index.partial.html -->

    <body>
        <section>
            <form action="" method="POST">
                <h1>Login</h1>
                <div class="inputbox">
                    <ion-icon name="mail-outline"></ion-icon>
                    <input type="text" required name="email">
                    <label for="">Username</label>
                </div>
                <div class="inputbox">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input type="password" name="password" required>
                    <label for="">Password</label>
                </div>
                <div class="forget">
                    <label for=""><input type="checkbox">Remember Me</label>
                    <a href="#">Forget Password</a>
                </div>
                <button>Log in</button>
                <div class="register">
                    <p>Don't have a account <a href="../login&daftar/daftar.php">Register</a></p>
                </div>
            </form>
        </section>
    </body>
    <!-- partial -->

</body>

</html>
