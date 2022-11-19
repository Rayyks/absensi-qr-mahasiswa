<head>
	<title>Absensi Mahaiswa Qr-Code</title>
	<!-- Favicons -->
	<link href="assets/img/favicon.png" rel="icon">
	<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
</head>
<?php
if (isset($_GET['nim']) && $_GET['nim'] != '') {
	//tampung data kiriman
	$id_kelas 	= $_GET['id_kelas'];
	$nim 		= $_GET['nim'];
	// include file qrlib.php
	include "phpqrcode/qrlib.php";
	//Nama Folder file QR Code kita nantinya akan disimpan
	$tempdir = "img_qrcode/";
	//jika folder belum ada, buat folder 
	if (!file_exists($tempdir)) {
		mkdir($tempdir);
	}
	#parameter inputan
	$isi_teks 	= $nim;
	$namafile 	= $nim . ".png";
	$quality 	= 'H'; //ada 4 pilihan, L (Low), M(Medium), Q(Good), H(High)
	$ukuran 	= 10; //batasan 1 paling kecil, 10 paling besar
	$padding 	= 2;
	QRCode::png($isi_teks, $tempdir . $namafile, $quality, $ukuran, $padding);

	echo "<script>alert('QRCode Selesai! Silakan Lihat');document.location.href='data_siswa.php?id_kelas=$id_kelas';</script>";
}
?>