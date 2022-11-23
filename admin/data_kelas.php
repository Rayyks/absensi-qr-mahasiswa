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
				<a href="index.html"><img src="logo_mhs.png" class="img-fluid"></a>
			</div>

			<nav class="nav-menu d-none d-lg-block">
				<ul class="nav-inner">
					<!-- <li><a href="index.php">Home</a></li> -->
					<li class="nav-logo"><a><img src="logo.png" width="60" class="img-fluid"></a></li>
					<li class="active"><a href="data_kelas.php">Data Kelas</a></li>
					<li><a href="laporan.php">Laporan</a></li>
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
							<a href="#" class="btn btn-primary" id="tambah_data" data-toggle="modal" data-target="#tambahdata">
								<span class="text">Tambah Data Kelas</span>
							</a>
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
											<form action="data_kelas_tambah.php" method="POST">
												<input type="hidden" name="tambah_data" />
												<div class="form-group">
													<label>Kelas</label>
													<select name="kelas" class="form-control">
														<option value="">-- Pilih Kelas --</option>
														<option value="M">M</option>
														<option value="P">P</option>
													</select>
												</div>
												<div class="form-group">
													<label>Jurusan</label>
													<input class="form-control" type="text" name="jurusan" placeholder="Masukan Jurusan">
												</div>
												<button type="sub mit" class="btn btn-primary btn-lg btn-block">Tambah</button>
												<br>
											</form>
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
													<th>No</th>
													<th>Kelas</th>
													<th>Jurusan</th>
													<th>Mahasiswa</th>
													<th>Edit</th>
													<th>Hapus</th>
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
														<td><?php echo $no; ?></td>
														<td><?php echo $data['kelas']; ?></td>
														<td><?php echo $data['jurusan_kelas']; ?></td>
														<td><a href="data_siswa.php?id_kelas=<?php echo $data['id_kelas']; ?>" class="btn btn-success">Lihat Mahasiswa</a></td>
														<td class="center">
															<!-- START EDIT DATA -->
															<a href="#" class="btn btn-primary" id="edit_data" data-toggle="modal" data-target="#editdata<?php echo $data['id_kelas']; ?>">
																<span class="text">Edit</span>
															</a>
															<div class="modal fade" id="editdata<?php echo $data['id_kelas']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
																<div class="modal-dialog" role="document">
																	<div class="modal-content col-lg-12">
																		<div class="modal-header">
																			<h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
																			<button class="close" type="button" data-dismiss="modal" aria-label="Close">
																				<span aria-hidden="true">×</span>
																			</button>
																		</div>
																		<?php
																		$id_kelas 	= $data['id_kelas'];
																		$sql_edit	= "SELECT * FROM kelas WHERE id_kelas='$id_kelas'";
																		$query_edit = mysqli_query($db_koneksi, $sql_edit);
																		$data_edit 	= mysqli_fetch_array($query_edit);
																		?>
																		<div class="pd-20 card-box height-100-p">
																			<form action="data_kelas_edit.php" method="POST">
																				<input type="hidden" name="id_kelas" value="<?php echo $id_kelas; ?>" />
																				<div class="form-group">
																					<label>Kelas</label>
																					<select name="kelas" class="form-control">
																						<option value="<?php echo $data_edit['kelas']; ?>"><?php echo $data_edit['kelas']; ?></option>
																						<option value="M">M</option>
																						<option value="P">P</option>
																					</select>
																				</div>
																				<div class="form-group">
																					<label>Jurusan</label>
																					<input class="form-control" type="text" name="jurusan" placeholder="Masukan  CTH: TRPL A Malam" value="<?php echo $data_edit['jurusan_kelas']; ?>" required>
																				</div>
																				<button type="submit" class="btn btn-primary btn-lg btn-block">Edit</button>
																				<br>
																			</form>
																		</div>
																	</div>
																</div>
															</div>
															<!-- END EDIT DATA -->
														</td>
														<td class="center"><a class="btn btn-danger" href="data_kelas_hapus.php?id=<?php echo $data['id_kelas']; ?>">Hapus</a></td>
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