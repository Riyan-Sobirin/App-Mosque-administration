<?php
	// setting tanggal
	$haries = array("Sunday" => "Minggu", "Monday" => "Senin", "Tuesday" => "Selasa", "Wednesday" => "Rabu", "Thursday" => "Kamis", "Friday" => "Jum'at", "Saturday" => "Sabtu");
	$bulans = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
	$bulans_count = count($bulans);
	// tanggal bulan dan tahun hari ini
	$hari_ini = $haries[date("l")];
	$bulan_ini = $bulans[date("n")];
	$tanggal = date("d");
	$bulan = date("m");
	$tahun = date("Y");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Masjid Nurul Qomar - <?php echo $pagedesc ?></title>

    <link href="admin/libs/images/brand-dkm.png" rel="icon" type="images/x-icon">

    <!-- Bootstrap Core CSS -->
	<link href="admin/libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- MetisMenu CSS -->
	<link href="admin/libs/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
	
	<!-- DataTables CSS -->
    <link href="admin/libs/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="admin/libs/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="admin/dist/css/sb-admin-2.css" rel="stylesheet">
	<link href="admin/dist/css/offline-font.css" rel="stylesheet">
	<link href="admin/dist/css/custom.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="admin/libs/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<!-- jQuery -->
	<script src="admin/libs/jquery/dist/jquery.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand hidden-xs" href="index.php">
					<img src="admin/libs/images/brand-dkm.png" alt="brand" width="32" class="float-left image-brand">
					<div class="float-right">&nbsp;<strong>Masjid Nurul Qomar</strong></div>
					<div class="clear-both"></div>
				</a>
				<a class="navbar-brand visible-xs" href="index.php">
					<img src="admin/libs/images/brand-dkm.png" alt="brand" width="32" class="float-left image-brand">
					<div class="float-right">&nbsp;<strong>Masjid Nurul Qomar</strong></div>
					<div class="clear-both"></div>
				</a>
			</div><!-- /.navbar-header -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
							<h4>Sistem Informasi Administrasi Keuangan Masjid Nurul Qomar</h4>
							<h5 class="text-muted"><i class="fa fa-calendar fa-fw"></i>&nbsp;<?php echo $hari_ini.", ".$tanggal." ".$bulan_ini." ".$tahun ?></h5>
						</li>
						<?php
							if($pagedesc == "Serambi") {
								echo '<li><a href="index.php" class="active"><i class="fa fa-home fa-fw"></i>&nbsp;Beranda</a></li>';
							}
							else {
								echo '<li><a href="index.php"><i class="fa fa-home fa-fw"></i>&nbsp;Beranda</a></li>';
							}
							if(isset($menuparent) && $menuparent == "konten_organisasi") {
								echo '<li class="active">';
							}
							else {
								echo '<li>';
							}
						?>
						<!-- open <li> tag generated with php, see line 103-114 -->
							<a href="#"><i class="fa fa-sitemap fa-fw"></i>&nbsp;Struktur Organisasi<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<?php
									$sql_menu = "SELECT * FROM konten_organisasi ORDER BY menu_konten ASC";
									$ress_menu = mysqli_query($conn, $sql_menu);
									while($menu = mysqli_fetch_array($ress_menu)) {
										if($pagedesc == $menu['judul_konten']) {
											echo '<li><a href="struktur_organisasi.php?org='. $menu['id_konten'] .'" class="active">'. $menu['menu_konten'] .'</a></li>';
										}
										else {
											echo '<li><a href="struktur_organisasi.php?org='. $menu['id_konten'] .'">'. $menu['menu_konten'] .'</a></li>';
										}
									}
								?>
							</ul><!-- /.nav-second-level -->
						</li>
						<?php
							if(isset($menuparent) && $menuparent == "kegiatan") {
								echo '<li class="active">';
							}
							else {
								echo '<li>';
							}
						?>
                        <!-- open <li> tag generated with php, see line 134-139 -->
							<a href="#"><i class="fa fa-recycle fa-fw"></i>&nbsp;Kegiatan<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<?php
									if($pagedesc == "Kegiatan") {
										echo '<li><a href="kegiatan.php" class="active">Data Kegiatan</a></li>';
									}
									else {
										echo '<li><a href="kegiatan.php">Data Kegiatan</a></li>';
									}
								?>
							</ul><!-- /.nav-second-level -->
						</li>
						<?php
							if(isset($menuparent) && $menuparent == "inventaris") {
								echo '<li class="active">';
							}
							else {
								echo '<li>';
							}
						?>
                        <!-- open <li> tag generated with php, see line 155-160 -->
							<a href="#"><i class="fa fa-archive fa-fw"></i>&nbsp;Inventaris<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<?php
									if($pagedesc == "Inventaris") {
										echo '<li><a href="inventaris.php" class="active">Riwayat Inventaris</a></li>';
									}
									else {
										echo '<li><a href="inventaris.php">Riwayat Inventaris</a></li>';
									}
								?>
							</ul><!-- /.nav-second-level -->
						</li>
						<li>
							<a href="#"><i class="fa fa-book fa-fw"></i>&nbsp;Laporan<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<?php
									if($pagedesc == "Laporan Bulanan") {
										echo '<li><a href="laporan_bulanan.php" class="active">Laporan Kas Bulanan</a></li>';
									}
									else {
										echo '<li><a href="laporan_bulanan.php">Laporan Kas Bulanan</a></li>';
									}
									if($pagedesc == "Laporan Tahunan") {
										echo '<li><a href="laporan_tahunan.php" class="active">Laporan Kas Tahunan</a></li>';
									}
									else {
										echo '<li><a href="laporan_tahunan.php">Laporan Kas Tahunan</a></li>';
									}
								?>
							</ul><!-- /.nav-second-level -->
						</li>
						<li>
							<a href="admin/"><i class="fa fa-key fa-fw"></i>&nbsp;Login<span class="fa arrow"></span></a>
							</li> 
					</ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>