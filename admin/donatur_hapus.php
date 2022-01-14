<?php
	include("sess_check.php");
	
	// query database mencari data donatur
	if(isset($_GET['don'])) {
		$sql = "SELECT * FROM donatur WHERE id_donatur='". $_GET['don'] ."'";
		$ress = mysqli_query($conn, $sql);
		$data = mysqli_fetch_array($ress);
	}
	
	// deskripsi halaman
	$pagedesc = "Donatur";
	$menuparent = "donatur";
	include("layout_top.php");
	include("dist/function/format_tanggal.php");
?>
<!-- top of file -->
		<!-- Page Content -->
		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Data Donatur</h1>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12">
						<form class="form-horizontal" action="donatur_delete.php" method="POST">
							<div class="panel panel-default">
								<div class="panel-heading"><h3>Hapus Data</h3></div>
								<div class="panel-body">
									<div class="form-group">
										<label class="control-label col-sm-3">Nama Donatur :</label>
										<div class="col-sm-6">
											<p class="form-control-static"><?php echo $data['nama_donatur'] ?></p>
											<input type="hidden" name="id_donatur" value="<?php echo $data['id_donatur'] ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Tempat Lahir :</label>
										<div class="col-sm-4">
											<p class="form-control-static"><?php echo $data['tpt_lahir'] ?></p>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Tanggal Lahir :</label>
										<div class="col-sm-6">
											<p class="form-control-static"><?php echo format_tanggal($data['tgl_lahir']) ?></p>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Jenis Kelamin :</label>
										<div class="col-sm-2">
											<p class="form-control-static"><?php echo $data['j_kelamin'] ?></p>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Alamat :</label>
										<div class="col-sm-6">
											<p class="form-control-static"><?php echo $data['alamat'] ?></p>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Telepon :</label>
										<div class="col-sm-4">
											<p class="form-control-static"><?php echo $data['telepon'] ?></p>
										</div>
									</div>
								</div>
								<div class="panel-footer">
									<a href="donatur.php" class="btn btn-default">Batal</a>
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