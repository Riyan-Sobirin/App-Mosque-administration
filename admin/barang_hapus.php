<?php
	include("sess_check.php");
	
	// query database mencari data barang
	if(isset($_GET['bar'])) {
		$sql = "SELECT * FROM barang WHERE kd_barang='". $_GET['bar'] ."'";
		$ress = mysqli_query($conn, $sql);
		$data = mysqli_fetch_array($ress);
	}
	
	// deskripsi halaman
	$pagedesc = "Barang";
	$menuparent = "inventaris";
	include("layout_top.php");
?>
<!-- top of file -->
		<!-- Page Content -->
		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Data Barang</h1>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12">
						<form class="form-horizontal" action="barang_delete.php" method="POST">
							<div class="panel panel-default">
								<div class="panel-heading"><h3>Hapus Data</h3></div>
								<div class="panel-body">
									<div class="form-group">
										<label class="control-label col-sm-3">Nama Barang :</label>
										<div class="col-sm-6">
											<p class="form-control-static"><?php echo $data['nama_barang'] ?></p>
											<input type="hidden" name="kd_barang" value="<?php echo $data['kd_barang'] ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Keterangan :</label>
										<div class="col-sm-4">
											<p class="form-control-static"><?php echo $data['keterangan_barang'] ?></p>
										</div>
									</div>
								</div>
								<div class="panel-footer">
									<a href="barang.php" class="btn btn-default">Batal</a>
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