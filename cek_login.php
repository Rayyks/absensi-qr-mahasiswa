<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];


$login = mysqli_query($db_koneksi, "SELECT * FROM user WHERE username='$username' and password='$password'");

$cek = mysqli_num_rows($login);


if ($cek > 0) {
    $data = mysqli_fetch_assoc($login);
    // cek jika user login sebagai admin
    if ($data['level'] == "dosen") {
        // buat session login dan username
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "dosen";
        // alihkan ke halaman dashboard admin
        header("location:./admin/data_kelas.php");
        // cek jika user login sebagai pegawai
    } else if ($data['level'] == "mahasiswa") {
        // buat session login dan username
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "mahasiswa";
        // alihkan ke halaman dashboard pegawai
        header("location:./mhs/absensi.php");
    } else {
        // alihkan ke halaman login kembali
        header("location:index1.php?pesan=gagal");
    }
} else {
    header("location:index.php?pesan=gagal");
}
