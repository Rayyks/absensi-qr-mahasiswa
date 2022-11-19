<?php
require('koneksi.php');
$id_kelas		= $_POST['id_kelas'];
$bulan			= $_POST['bulan'];
$sql			= "SELECT * FROM kelas WHERE id_kelas='$id_kelas'";
$query  		= mysqli_query($db_koneksi, $sql);
$data 			= mysqli_fetch_array($query);
$kelas			= $data["kelas"];
$jurusan		= $data["jurusan_kelas"];
$dari_tanggal 	= date("Y-$bulan-01");
$sampai_tanggal = date("Y-$bulan-t");
$tgl_terakhir 	= date('t', strtotime($dari_tanggal));
$sql			= "SELECT nim, nama_siswa FROM mahasiswa WHERE id_kelas='$id_kelas'";
$query  		= mysqli_query($db_koneksi, $sql);
$d				= 0;
while ($data 	= mysqli_fetch_array($query)) {
	$nim_siswa[$d]	= $data["nim"];
	$nama_siswa[$d]	= $data["nama_siswa"];
	$sql2			= "SELECT * FROM absensi WHERE nim='$nim_siswa[$d]' AND tanggal BETWEEN '$dari_tanggal' AND '$sampai_tanggal'";
	$query2  		= mysqli_query($db_koneksi, $sql2);
	for ($h = 1; $h <= $tgl_terakhir; $h++) {
		if ($h < 10) {
			$h = "0" . $h;
		}
		$keterangan[$d][$h]	= "";
	}
	while ($data2 	= mysqli_fetch_array($query2)) {
		for ($h = 1; $h <= $tgl_terakhir; $h++) {
			if ($h < 10) {
				$h = "0" . $h;
			}
			if (date("Y-$bulan-$h") == $data2["tanggal"]) {
				$keterangan[$d][$h]	= "H";
			}
		}
	}
	$d++;
}
if ($bulan == '01') {
	$bulan = "Januari";
} else if ($bulan == '02') {
	$bulan = "Februari";
} else if ($bulan == '03') {
	$bulan = "Maret";
} else if ($bulan == '04') {
	$bulan = "April";
} else if ($bulan == '05') {
	$bulan = "Mei";
} else if ($bulan == '06') {
	$bulan = "Juni";
} else if ($bulan == '07') {
	$bulan = "Juli";
} else if ($bulan == '08') {
	$bulan = "Agustus";
} else if ($bulan == '09') {
	$bulan = "September";
} else if ($bulan == '10') {
	$bulan = "Oktober";
} else if ($bulan == '11') {
	$bulan = "November";
} else if ($bulan == '12') {
	$bulan = "Desember";
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Absensi Mahaiswa Qr-Code</title>
	<!-- Favicons -->
	<link href="assets/img/favicon.png" rel="icon">
	<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
	<!-- FONT AWESOME STYLE  -->
	<link href="assets/css/font-awesome.css" rel="stylesheet" />
	<!-- CUSTOM STYLE  -->
	<link href="assets/css/style.css" rel="stylesheet" />
</head>

<body>
	<div class="content-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="panel panel-default">
						<br>
						<center>
							<div class="panel-heading">Absensi Kelas <?php echo $kelas . " " . $jurusan; ?></div>
							<table width="90%" border="1">
								<thead>
									<tr>
										<th width="1%" rowspan="2">No</th>
										<th width="15%" rowspan="2">Nama Mahaiswa</th>
										<th align="center" colspan="31">Absensi Bulan <?php echo $bulan; ?></th>
									</tr>
									<tr>
										<?php for ($h = 1; $h <= $tgl_terakhir; $h++) { ?>
											<td width="2%"><?php echo $h; ?></td>
										<?php } ?>
									</tr>
								</thead>
								<tbody>
									<?php for ($i = 0; $i < $d; $i++) { ?>
										<tr class="odd gradeX">
											<td><?php echo $i + 1; ?></td>
											<td><?php echo $nama_siswa[$i]; ?></td>
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
						</center>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		window.print();
	</script>
</body>

</html>