<?php
require("koneksi.php");

//memanggil data inputan
$kelas	= $_POST["kelas"];
$jurusan = $_POST["jurusan"];

//sql memasukan data ke database
$tambah_data = "INSERT INTO kelas 
				   (kelas, jurusan_kelas)
				   VALUE ('$kelas','$jurusan')";
$query  	 = mysqli_query($db_koneksi, $tambah_data);

//mengarahkan secara otomatis
echo "<meta http-equiv='refresh' content='0;url=data_kelas.php'>";
