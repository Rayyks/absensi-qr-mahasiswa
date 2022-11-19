<?php
require("koneksi.php");

//sql menghapus data ke database
$id_siswa       = $_GET["id_siswa"];
$id_kelas       = $_GET["id_kelas"];
$hapus_data     = "DELETE FROM mahasiswa WHERE id_siswa='$id_siswa'";
$query          = mysqli_query($db_koneksi, $hapus_data);

//mengarahkan secara otomatis
echo "<meta http-equiv='refresh' content='0;url=data_siswa.php?id_kelas=$id_kelas'>";
