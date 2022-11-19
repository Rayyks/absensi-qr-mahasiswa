<?php
	require("koneksi.php");
	
	//sql menghapus data ke database
	$id_kelas	= $_GET["id"];
	$hapus_data = "DELETE FROM kelas WHERE id_kelas='$id_kelas'";
	$query  	= mysqli_query($db_koneksi, $hapus_data);
	
	//mengarahkan secara otomatis
	echo "<meta http-equiv='refresh' content='0;url=data_kelas.php'>";
?>