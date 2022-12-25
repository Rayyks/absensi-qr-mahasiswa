<!DOCTYPE html>
<html lang="en">
<?php require("koneksi.php"); ?>

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
				<a href="index.html"><img src="../logo.png" class="img-fluid"></a>
			</div>

			<nav class="nav-menu d-none d-lg-block">
				<ul class="nav-inner">
					<!-- <li><a href="index.php">Home</a></li> -->
					<li><a href="absensi.php">Absensi</a></li>

					<li class="nav-logo"><a><img src="../logo.png" width="60" class="img-fluid"></a></li>

					<li class="active"><a href="data_kelas.php">Data Kelas</a></li>
					<li class="btn btn-danger"><a href="../logout.php">Logout</a></li>
				</ul>
			</nav><!-- .nav-menu -->

		</div>
	</header><!-- End Header -->

	<main id="main">
		<section id="contact" class="contact section-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="info d-flex flex-column justify-content-center">
							<!-- START TAMBAH DATA -->
							<div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content col-lg-12">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
											<button class="close" type="button" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">×</span>
											</button>
										</div>
										<div class="pd-20 card-box height-100-p">
										</div>
									</div>
								</div>
							</div>
							<!-- END TAMBAH DATA -->
							<!-- Advanced Tables -->
							<div class="panel panel-default">
								<div class="panel-heading">
									Data Kelas
								</div>
								<div class="panel-body">
									<div class="table-responsive">
										<table class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th class="text-center">No</th>
													<th class="text-center">Kelas</th>
													<th class="text-center">Jurusan</th>
													<th class="text-center">Mahasiswa</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$sql	= "SELECT * FROM kelas ORDER BY kelas ASC";
												$query  = mysqli_query($db_koneksi, $sql);
												$no = 1;
												while ($data = mysqli_fetch_array($query)) {
												?>
													<tr class="odd gradeX">
														<td class="text-center"><?php echo $no; ?></td>
														<td class="text-center"><?php echo $data['kelas']; ?></td>
														<td class="text-center"><?php echo $data['jurusan_kelas']; ?></td>
														<td class="text-center"><a href="data_siswa.php?id_kelas=<?php echo $data['id_kelas']; ?>" class="btn btn-success">Lihat Mahasiswa</a></td>
													</tr>
												<?php
													$no++;
												}
												?>
											</tbody>
										</table>
									</div>

								</div>
							</div>
							<!--End Advanced Tables -->
						</div>
					</div>
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
</body>

</html>