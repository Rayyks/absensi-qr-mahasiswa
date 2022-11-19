<?php
require("koneksi.php");

//memanggil data inputan
$id_kelas	= $_POST["id_kelas"];
$nim		= $_POST["nim"];
$nama		= $_POST["nama"];
$jk			= $_POST["jk"];

//sql memasukan data ke database
$tambah_data = "INSERT INTO mahasiswa 
				   (id_kelas, nim, nama_siswa, jenis_kelamin)
				   VALUE ('$id_kelas','$nim','$nama','$jk')";
$query  	 = mysqli_query($db_koneksi, $tambah_data);

//mengarahkan secara otomatis
echo "<meta http-equiv='refresh' content='0;url=data_siswa.php?id_kelas=$id_kelas'>";
