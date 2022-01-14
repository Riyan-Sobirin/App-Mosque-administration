<?php
	include("sess_check.php");

	// query database mencari data infaq
	if(isset($_GET['inf'])) {
		$sql = "SELECT * FROM infaq WHERE no_infaq='". $_GET['inf'] ."'";
		$ress = mysqli_query($conn, $sql);
		$data = mysqli_fetch_array($ress);
	}

	include("dist/function/format_nomor.php");
	include("dist/function/format_tanggal.php");
	include("dist/function/format_rupiah.php");

	// deskripsi halaman
	$pagedesc = "Masjid Al Muhajirin " . format_nomor("INF", $data['no_infaq']);
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
			<h4 class="text-center">BUKTI KAS MASUK</h4>
			<br />
			<table class="table table-borderless">
				<tbody>
					<tr>
						<td width="23%">No. Bukti</td>
						<td width="2%">:</td>
						<td><?php echo format_nomor("INF", $data['no_infaq']) ?></td>
					</tr>
					<tr>
						<td>Sudah terima dari</td>
						<td>:</td>
						<td><?php echo $data['terima_dari'] ?></td>
					</tr>
					<tr>
						<td>Jumlah</td>
						<td>:</td>
						<td><h5><?php echo format_rupiah_kwitansi($data['jumlah']) ?></h5></td>
					</tr>
					<tr>
						<td>Terbilang</td>
						<td>:</td>
						<td>
							<input type="hidden" id="jumlah" value="<?php echo $data['jumlah'] ?>">
							<span id="jumlah2"></span>
						</td>
					</tr>
					<tr>
						<td>Keterangan</td>
						<td>:</td>
						<td><?php echo $data['keterangan'] ?></td>
					</tr>
				</tbody>
			</table>
			<br />
			<p class="text-justify text-keuangan">Kami segenap pengurus DKM Masjid Jami Annur mengucapkan terima kasih atas apa yang telah diberikan. Semoga menjadi amal baik yang bermanfaat di akhirat nanti, aamiin.</p>
			<br />
			<table class="table table-borderless">
				<tbody>
					<tr>
						<td colspan="3">&nbsp;</td>
						<td class="text-center"><?php echo format_tanggal_laporan("Jakarta", $data['tgl_infaq']) ?></td>
					</tr>
					<tr><td colspan="4">&nbsp;</td></tr>
					<tr>
						<td width="30%" class="text-center">Diterima dari</td>
						<td width="30%" class="text-center">Diterima oleh</td>
						<td width="10%">&nbsp;</td>
						<td width="30%" class="text-center">Disetujui oleh</td>
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
			$('#jumlah').terbilang({
				'style'			: 3, 
				'output_div' 	: "jumlah2",
				'akhiran'		: "Rupiah",
			});

			window.print();
		});
	</script>

	<!-- Bootstrap Core JavaScript -->
	<script src="libs/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- jTebilang JavaScript -->
	<script src="libs/jTerbilang/jTerbilang.js"></script>

</body>
</html>