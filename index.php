<?php
	include("sess_check.php");
	
	// query database mencari data keuangan
	$sql_sodaqoh = "SELECT SUM(jumlah) AS total FROM sodaqoh";
	$ress_sodaqoh = mysqli_query($conn, $sql_sodaqoh);
	$sodaqoh = mysqli_fetch_array($ress_sodaqoh);
	
	$sql_infaq = "SELECT SUM(jumlah) AS total FROM infaq";
	$ress_infaq = mysqli_query($conn, $sql_infaq);
	$infaq = mysqli_fetch_array($ress_infaq);
	
	$sql_keluar = "SELECT SUM(jumlah) AS total FROM pengeluaran";
	$ress_keluar = mysqli_query($conn, $sql_keluar);
	$keluar = mysqli_fetch_array($ress_keluar);
	
	$saldo = ($sodaqoh['total'] + $infaq['total']) - $keluar['total'];
	
	// deskripsi halaman
	$pagedesc = "Serambi";
	include("layout_top.php");
	include("admin/dist/function/format_rupiah.php");
?>
<!-- top of file -->
		<!-- Page Content -->
		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Beranda</h1>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
				
				<div class="row">
					<div class="col-lg-6 col-md-6">
						<div class="panel panel-green">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-plus-circle fa-3x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge"><?php echo format_rupiah($infaq['total']); ?></div>
										<div><h4>Total Infaq</h4></div>
									</div>
								</div>
							</div>
							<a href="#">
								<div class="panel-footer">
									<span class="pull-left">Lihat Rincian</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div><!-- /.panel-green -->
					
					<div class="col-lg-6 col-md-6">
						<div class="panel panel-green">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-plus-circle fa-3x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge"><?php echo format_rupiah($sodaqoh['total']); ?></div>
										<div><h4>Total Shodaqoh</h4></div>
									</div>
								</div>
							</div>
							<a href="#">
								<div class="panel-footer">
									<span class="pull-left">Lihat Rincian</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div><!-- /.panel-green -->
				</div><!-- /.row -->
				
				<div class="row">
					<div class="col-lg-6 col-md-6">
						<div class="panel panel-red">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-minus-circle fa-3x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge"><?php echo format_rupiah($keluar['total']); ?></div>
										<div><h4>Total Pengeluaran</h4></div>
									</div>
								</div>
							</div>
							<a href="#">
								<div class="panel-footer">
									<span class="pull-left">Lihat Rincian</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div><!-- /.panel-red -->
					
					<div class="col-lg-6 col-md-6">
						<div class="panel panel-yellow">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-check-circle fa-3x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge"><?php echo format_rupiah($saldo); ?></div>
										<div><h4>Total Saldo</h4></div>
									</div>
								</div>
							</div>
							<a href="#">
								<div class="panel-footer">
									<span class="pull-left">Lihat Rincian</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div><!-- /.panel-yellow -->
				</div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /#page-wrapper -->
<!-- bottom of file -->
<?php
	include("layout_bottom.php");
?>