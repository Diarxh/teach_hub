<?php
session_start();
include '../koneksi.php';
$username = $_POST['email'];
$password = $_POST['password'];

$data = mysqli_query($koneksi, "SELECT * FROM users WHERE email='$username' and password='$password'");

$cek = mysqli_num_rows($data);

if ($cek > 0) {
    $data = mysqli_fetch_assoc($data);
    if ($data['level'] == 'admin') {
        $_SESSION['user'] = $username;
        $_SESSION['status'] = 'login';
        header('location:../admin/manage-admin.php');
    } elseif ($data['level'] == 'user') {
        $_SESSION['email'] = $username;
        $_SESSION['status'] = 'login';
        header('location:../admin/indek.php');
    }
} else {
    echo "<script language='javascript'>";
    echo "alert('SANDI & PASSWORD SALAH (LOL)')";
    echo '</script>';
    echo "<script language='javascript'>location='../index.php'</script>";  // mendirect ke index.php
}
