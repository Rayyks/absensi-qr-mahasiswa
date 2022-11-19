<?php
	require("koneksi.php");
	
	//memanggil data inputan
	$id_kelas	= $_POST["id_kelas"];
	$kelas		= $_POST["kelas"];
	$jurusan	= $_POST["jurusan"];
	
	//sql memasukan data ke database
	$edit_data	= "UPDATE kelas SET kelas='$kelas', jurusan_kelas='$jurusan' WHERE id_kelas='$id_kelas'";
	$query  	= mysqli_query($db_koneksi, $edit_data);
	  
	//mengarahkan secara otomatis
	echo "<meta http-equiv='refresh' content='0;url=data_kelas.php'>";
?>