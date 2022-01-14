<?php
	include("sess_check.php");

	// keperluan reporting
	$bulans = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
	$tgl_cetak = date("Y-m-d");
	
	// data inventaris
	$data = array();
	$sql = "SELECT * FROM inventaris INNER JOIN barang ON inventaris.kd_barang=barang.kd_barang ORDER BY inventaris.tgl_terima DESC";
	$ress = mysqli_query($conn, $sql);
	while($li = mysqli_fetch_array($ress)) {
		$col = array();
		$col['tanggal'] = $li['tgl_terima'];
		$col['nama'] = $li['nama_barang'];
		$col['jumlah'] = $li['jumlah'];
		$col['keterangan'] = $li['keterangan'];
		$data[] = $col;
	}

	include("dist/function/format_rupiah.php");
	include("dist/function/format_tanggal.php");

	// deskripsi halaman
	$pagedesc = "Masjid Al Muhajirin - Laporan Inventaris " . format_tanggal_strip($tgl_cetak);
	$pagetitle = str_replace(" ", "_", $pagedesc)
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="sistem informasi administrasi keuangan masjid">
	<meta name="author" content="universitas pamulang">

	<title><?php echo $pagetitle ?></title>

	<link href="libs/images/brand-dkm.png" rel="icon" type="images/x-icon">

	<!-- Bootstrap Core CSS -->
	<link href="libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="dist/css/offline-font.css" rel="stylesheet">
	<link href="dist/css/custom-report.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="libs/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<!-- jQuery -->
	<script src="libs/jquery/dist/jquery.min.js"></script>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<section id="header-kop">
		<div class="container-fluid">
			<table class="table table-borderless">
				<tbody>
					<tr>
						<td rowspan="3" width="16%" class="text-center">
							<img src="libs/images/logo-dkm.jpg" alt="logo-dkm" width="80" />
						</td>
						<td class="text-center"><h3>DEWAN KEMAKMURAN MASJID (DKM)</h3></td>
						<td rowspan="3" width="16%">&nbsp;</td>
					</tr>
					<tr>
						<td class="text-center"><h2>MASJID AL MUHAJIRIN</h2></td>
					</tr>
					<tr>
						<td class="text-center">Jl. Flamboyan No. 27 RT 13 RW 06</td>
					</tr>
				</tbody>
			</table>
			<hr class="line-top" />
		</div>
	</section>

	<section id="body-of-report">
		<div class="container-fluid">
			<h4 class="text-center">LAPORAN INVENTARIS</h4>
			<br />
			<table class="table table-bordered table-keuangan">
				<thead>
					<tr>
						<th>No</th>
						<th>Tanggal</th>
						<th>Nama Barang</th>
						<th>Jumlah</th>
						<th>Keterangan</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$i = 1;
						foreach($data as $row) {
							echo '<tr>';
							echo '<td class="text-center">'. $i .'</td>';
							echo '<td class="text-center">'. format_tanggal($row['tanggal']) .'</td>';
							echo '<td>'. $row['nama'] .'</td>';
							echo '<td class="text-center">'. $row['jumlah'] .'</td>';
							echo '<td>'. $row['keterangan'] .'</td>';
							echo '</tr>';

							$i++;
						}
						if($i == 1) {
							echo '<tr><td colspan="5" class="text-center">-= Belum ada data =-</td></tr>';
						}
					?>
				</tbody>
			</table>
			<br />
			<table class="table table-borderless">
				<tbody>
					<tr>
						<td colspan="3">&nbsp;</td>
						<td class="text-center"><?php echo format_tanggal_laporan("Jakarta", $tgl_cetak) ?></td>
					</tr>
					<tr><td colspan="4">&nbsp;</td></tr>
					<tr>
						<td width="30%" class="text-center">Bendahara</td>
						<td width="30%" class="text-center">Sekretaris</td>
						<td width="10%">&nbsp;</td>
						<td width="30%" class="text-center">Ketua</td>
					</tr>
					<tr><td colspan="4" style="height: 60px">&nbsp;</td></tr>
					<tr>
						<td><div class="line-ttd"></div></td>
						<td><div class="line-ttd"></div></td>
						<td>&nbsp;</td>
						<td><div class="line-ttd"></div></td>
					</tr>
				</tbody>
			</table>
		</div><!-- /.container -->
	</section>

	<script type="text/javascript">
		$(document).ready(function() {			
			window.print();
		});
	</script>

	<!-- Bootstrap Core JavaScript -->
	<script src="libs/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- jTebilang JavaScript -->
	<script src="libs/jTerbilang/jTerbilang.js"></script>

</body>
</html>