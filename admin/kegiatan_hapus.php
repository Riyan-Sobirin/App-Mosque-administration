<?php
	include("sess_check.php");
	include("dist/function/format_tanggal.php");
	
	// query database mencari data kegiatan
	if(isset($_GET['keg'])) {
		$sql = "SELECT * FROM kegiatan WHERE keg_id='". $_GET['keg'] ."'";
		$ress = mysqli_query($conn, $sql);
		$data = mysqli_fetch_array($ress);
	}
	
	// deskripsi halaman
	$pagedesc = "Kegiatan";
	$menuparent = "kegiatan";
	include("layout_top.php");
?>
<!-- top of file -->
		<!-- Page Content -->
		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Data Kegiatan</h1>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12">
						<form class="form-horizontal" action="kegiatan_delete.php" method="POST">
							<div class="panel panel-default">
								<div class="panel-heading"><h3>Hapus Data</h3></div>
								<div class="panel-body">
									<div class="form-group">
										<label class="control-label col-sm-3">Nama Kegiatan :</label>
										<div class="col-sm-6">
											<p class="form-control-static"><?php echo $data['keg_nama'] ?></p>
											<input type="hidden" name="id" value="<?php echo $data['keg_id'] ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Tanggal :</label>
										<div class="col-sm-6">
											<p class="form-control-static"><?php echo format_tanggal($data['keg_tgl']) ?></p>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Keterangan :</label>
										<div class="col-sm-4">
											<p class="form-control-static"><?php echo $data['keg_ket'] ?></p>
										</div>
									</div>
								</div>
								<div class="panel-footer">
									<a href="kegiatan.php" class="btn btn-default">Batal</a>
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