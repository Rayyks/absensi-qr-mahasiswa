<?php
//untuk mengatur waktu jam secara online dan realtime
date_default_timezone_set('Asia/Jakarta');

//kodingan SQL untuk menghubungkan ke database
$db_host        = "localhost";
$db_user        = "root";
$db_pass        = "";
$db_nama        = "absensi_mahasiswa";
$db_koneksi     = mysqli_connect($db_host, $db_user, $db_pass, $db_nama);
