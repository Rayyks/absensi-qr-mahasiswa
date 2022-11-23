<!DOCTYPE html>
<html lang="en">
<?php require("koneksi.php"); ?>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Absensi Siswa Qr-Code</title>

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
          <li class="nav-logo"><a><img src="logo.png" width="60" class="img-fluid"></a></li>
          <li><a href="data_kelas.php">Data Kelas</a></li>
          <li class="active"><a href="laporan.php">Laporan</a></li>
          <li class="btn btn-danger logout"><a href="../logout.php">Logout</a></li>
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
              <form action="cetak_laporan.php" target="_blank" method="POST">
                <div class="form-row">
                  <div class="col-md-6 form-group">
                    <label>Pilih Kelas :</label>
                    <select class="form-control" name="id_kelas">
                      <?php
                      $sql    = "SELECT * FROM kelas ORDER BY kelas ASC";
                      $query    = mysqli_query($db_koneksi, $sql);
                      while ($data = mysqli_fetch_array($query)) {
                      ?>
                        <option value="<?php echo $data["id_kelas"]; ?>"><?php echo $data["kelas"] . " - " . $data["jurusan_kelas"]; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="col-md-6 form-group">
                    <label>Pilih Bulan:</label>
                    <select class="form-control" name="bulan">
                      <option value="01">Januari</option>
                      <option value="02">Februari</option>
                      <option value="03">Maret</option>
                      <option value="04">April</option>
                      <option value="05">Mei</option>
                      <option value="06">Juni</option>
                      <option value="07">Juli</option>
                      <option value="08">Agustus</option>
                      <option value="09">September</option>
                      <option value="10">Oktober</option>
                      <option value="11">November</option>
                      <option value="12">Desember</option>
                    </select>
                  </div>
                </div>
                <div class="text-center"><button type="submit" class="btn btn-success">Cetak Laporan</button></div>
              </form>
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