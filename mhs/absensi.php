<?php
require('koneksi.php');
if (isset($_POST['scancode'])) {
	$sql	= "SELECT * FROM mahasiswa WHERE nim='$_POST[scancode]'";
	$query  = mysqli_query($db_koneksi, $sql);
	$data 	= mysqli_fetch_array($query);
	if (!empty($data['nim'])) {
		$id_kelas	= $data["id_kelas"];
		$nim	 	= $data["nim"];
		$nama_siswa	= $data["nama_siswa"];
		$hari_ini	= date("Y-m-d");
		$jam		= date("H:i:s");
		$status		= "Hadir";

		$sql1		= "SELECT tanggal FROM absensi WHERE nim='$nim' AND tanggal='$hari_ini'";
		$query1  	= mysqli_query($db_koneksi, $sql1);
		$data1 		= mysqli_fetch_array($query1);
		if ($data1 	= mysqli_num_rows($query1) == 0) {
			$tambah_data = "INSERT INTO absensi 
							   (nim, tanggal, jam, status)
							   VALUE ('$nim','$hari_ini','$jam','$status')";
			$query  	= mysqli_query($db_koneksi, $tambah_data);
		}
		$sql2		= "SELECT * FROM kelas WHERE id_kelas='$id_kelas'";
		$query2  	= mysqli_query($db_koneksi, $sql2);
		$data2 		= mysqli_fetch_array($query2);
		$kelas		= $data2["kelas"];
		$jurusan	= $data2["jurusan_kelas"];

		$sql3		= "SELECT * FROM mahasiswa WHERE id_kelas='$id_kelas'";
		$query3  	= mysqli_query($db_koneksi, $sql3);
		$d			= 0;
		while ($data3 = mysqli_fetch_array($query3)) {
			$nim_siswa[$d]	= $data3["nim"];
			$nama[$d]		= $data3["nama_siswa"];
			$dari_tanggal 	= date("Y-m-01");
			$sampai_tanggal = date("Y-m-t");
			$tgl_terakhir 	= date('t', strtotime($hari_ini));
			$sql4			= "SELECT * FROM absensi WHERE nim='$nim_siswa[$d]' AND tanggal BETWEEN '$dari_tanggal' AND '$sampai_tanggal'";
			$query4  		= mysqli_query($db_koneksi, $sql4);
			for ($h = 1; $h <= $tgl_terakhir; $h++) {
				if ($h < 10) {
					$h = "0" . $h;
				}
				$keterangan[$d][$h]	= "";
			}
			while ($data4 	= mysqli_fetch_array($query4)) {
				for ($h = 1; $h <= $tgl_terakhir; $h++) {
					if ($h < 10) {
						$h = "0" . $h;
					}
					if (date("Y-m-$h") == $data4["tanggal"]) {
						$keterangan[$d][$h]	= "H";
					}
				}
			}
			$d++;
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>Absensi Mahasiswa Qr-Code</title>

	<!-- Favicons -->
	<link href="assets/img/favicon.png" rel="icon">
	<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
	<!-- Vendor CSS Files -->
	<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
	<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
	<link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
	<link href="assets/vendor/aos/aos.css" rel="stylesheet">

	<!-- Template Main CSS File -->
	<link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

	<!-- ======= Header ======= -->
	<header id="header" class="d-flex align-items-center">
		<div class="container">

			<!-- The main logo is shown in mobile version only. The centered nav-logo in nav menu is displayed in desktop view  -->
			<div class="logo d-block d-lg-none">
				<a href="index.html"><img src="logo.png" class="img-fluid"></a>
			</div>

			<nav class="nav-menu d-none d-lg-block">
				<ul class="nav-inner">
					<!-- <li><a href="index.php">Home</a></li> -->
					<li class="active"><a href="absensi.php">Absensi</a></li>

					<li class="nav-logo"><a><img src="logo.png" width="60" class="img-fluid"></a></li>

					<li><a href="data_kelas.php">Data Kelas</a></li>
					<li class="btn btn-danger"><a href="../logout.php">Logout</a></li>
				</ul>
			</nav><!-- .nav-menu -->

		</div>
	</header><!-- End Header -->
	<main id="main">
		<section id="pricing" class="pricing section-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 col-md-2 mt-2 mt-md-0"></div>
					<div class="col-lg-8 col-md-8 mt-8 mt-md-0">
						<div class="box recommended" data-aos="zoom-in">
							<span class="recommended-badge">Absensi Qr-Code<br>Arahkan Kartu Anda Ke Kamera</span>
							<center>
								<canvas></canvas>
							</center>
						</div>
						<?php if (!empty($data['nim'])) { ?>
							<div class="alert alert-success">
								<center>
									<?php if ($data1 = mysqli_num_rows($query1) == 0) { ?>
										<strong>Berhasil..!</strong><br>
										<i>Terima kasih <?php echo $nama_siswa; ?></i>
								</center>
							<?php }
									if ($data1 = mysqli_num_rows($query1) !== 0) { ?>
								<strong>Gagal..!</strong><br>
								<i>Anda Sudah Absen hari ini</i>
								</center>
							<?php } ?>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">Data Mahasiswa <?php echo $kelas . " " . $jurusan; ?></div>
								<div class="panel">
									<div class="table-responsive">
										<table class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th width="1%" rowspan="2">No</th>
													<th width="68%" rowspan="2">Nama Mahasiswa</th>
													<th width="68%" colspan="31">Absensi Bulan <?php echo date("F"); ?></th>
												</tr>
												<tr>
													<?php for ($h = 1; $h <= $tgl_terakhir; $h++) { ?>
														<th width="1%"><?php echo $h; ?></th>
													<?php } ?>
												</tr>
											</thead>
											<tbody>
												<?php for ($i = 0; $i < $d; $i++) { ?>
													<tr class="odd gradeX">
														<td><?php echo $i + 1; ?></td>
														<td><?php echo $nama[$i]; ?></td>
														<?php for ($h = 1; $h <= $tgl_terakhir; $h++) {
															if ($h < 10) {
																$h = "0" . $h;
															} ?>
															<td><?php echo $keterangan[$i][$h];
															} ?></td>
													</tr>
												<?php } ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						<?php }
						if (isset($_POST['scancode']) and empty($data['nim'])) { ?>
							<div class="alert alert-danger">
								<center>
									<strong>Gagal..!</strong><br>
									<i>Kartu Anda Tidak Terdaftar</i>
								</center>
							</div>
						<?php } ?>
					</div>
					<div class="col-lg-2 col-md-2 mt-2 mt-md-0"></div>
				</div>
				<br><br><br><br><br><br><br><br><br><br><br><br>
			</div>
		</section>
	</main><!-- End #main -->

	<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

	<!-- Vendor JS Files -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
	<script src="assets/vendor/php-email-form/validate.js"></script>
	<script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>
	<script src="assets/vendor/venobox/venobox.min.js"></script>
	<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
	<script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
	<script src="assets/vendor/aos/aos.js"></script>

	<!-- Template Main JS File -->
	<script src="assets/js/main.js"></script>

	<!-- JS Kamera -->
	<script src="assets/js/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="assets/js/qrcodelib.js"></script>
	<script type="text/javascript" src="assets/js/webcodecamjquery.js"></script>
	<script type="text/javascript">
		var arg = {
			resultFunction: function(result) {
				var redirect = 'absensi.php';
				$.redirectPost(redirect, {
					scancode: result.code
				});
			}
		};

		var decoder = $("canvas").WebCodeCamJQuery(arg).data().plugin_WebCodeCamJQuery;
		decoder.buildSelectMenu("select");
		decoder.play();
		$('select').on('change', function() {
			decoder.stop().play();
		});

		// jquery extend function
		$.extend({
			redirectPost: function(location, args) {
				var form = '';
				$.each(args, function(key, value) {
					form += '<input type="hidden" name="' + key + '" value="' + value + '">';
				});
				$('<form action="' + location + '" method="POST">' + form + '</form>').appendTo('body').submit();
			}
		});
	</script>
</body>

</html>