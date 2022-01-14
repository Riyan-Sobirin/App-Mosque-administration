<?php
	include("sess_check.php");
	
	// query database mencari data inventaris
	if(isset($_GET['inv'])) {
		$sql = "SELECT * FROM inventaris INNER JOIN barang ON inventaris.kd_barang=barang.kd_barang WHERE inventaris.no_inventaris='". $_GET['inv'] ."'";
		$ress = mysqli_query($conn, $sql);
		$data = mysqli_fetch_array($ress);
	}
	
	// deskripsi halaman
	$pagedesc = "Inventaris";
	$menuparent = "inventaris";
	include("layout_top.php");
	include("dist/function/format_nomor.php");
	include("dist/function/format_tanggal.php");
?>
<!-- top of file -->
		<!-- Page Content -->
		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Data Penerimaan Inventaris</h1>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12">
						<form class="form-horizontal" action="inventaris_delete.php" method="POST">
							<div class="panel panel-default">
								<div class="panel-heading"><h3>Hapus Data</h3></div>
								<div class="panel-body">
									<input type="hidden" name="no_inventaris" value="<?php echo $data['no_inventaris'] ?>">
									<div class="form-group">
										<label class="control-label col-sm-3">Nomor Transaksi :</label>
										<div class="col-sm-2">
											<p class="form-control-static"><?php echo format_nomor("INV", $data['no_inventaris']) ?></p>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Tanggal :</label>
										<div class="col-sm-6">
											<p class="form-control-static"><?php echo format_tanggal($data['tgl_terima']) ?></p>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Jumlah :</label>
										<div class="col-sm-4">
											<p class="form-control-static"><?php echo $data['jumlah'] ?></p>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Keterangan :</label>
										<div class="col-sm-6">
											<p class="form-control-static"><?php echo $data['keterangan'] ?></p>
										</div>
									</div>
								</div>
								<div class="panel-footer">
									<a href="inventaris.php" class="btn btn-default">Batal</a>
									<button type="submit" name="hapus" class="btn btn-danger pull-right">Hapus Data</button>
								</div>
							</div><!-- /.panel -->
						</form>
					</div><!-- /.col-lg-12 -->
				</div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /#page-wrapper -->
<!-- bottom of file -->
<?php
	include("layout_bottom.php");
?>