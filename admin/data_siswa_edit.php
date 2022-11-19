<?php
require("koneksi.php");

//memanggil data inputan
$id_kelas       = $_POST["id_kelas"];
$id_siswa       = $_POST["id_siswa"];
$nama           = $_POST["nama"];
$nim            = $_POST["nim"];
$jk             = $_POST["jk"];

//sql memasukan data ke database
$edit_data    = "UPDATE mahasiswa SET nama_siswa='$nama', nim='$nim', jenis_kelamin='$jk' WHERE id_siswa='$id_siswa'";
$query      = mysqli_query($db_koneksi, $edit_data);

//mengarahkan secara otomatis
echo "<meta http-equiv='refresh' content='0;url=data_siswa.php?id_kelas=$id_kelas'>";
