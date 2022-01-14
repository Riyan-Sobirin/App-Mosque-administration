<?php
	include("sess_check.php");
	
	// query database mencari data barang
	$sql = "SELECT kd_barang FROM barang";
	$ress = mysqli_query($conn, $sql);
	$rows = mysqli_num_rows($ress);
	
	// membuat id_baru
	$newid_barang = $rows + 1;
	
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
						<form class="form-horizontal" action="barang_insert.php" method="POST">
							<div class="panel panel-default">
								<div class="panel-heading"><h3>Tambah Data</h3></div>
								<div class="panel-body">
									<div class="form-group">
										<label class="control-label col-sm-3">Nama Barang</label>
										<div class="col-sm-6">
											<input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" required>
											<input type="hidden" name="kd_barang" value="<?php echo $newid_barang ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Keterangan</label>
										<div class="col-sm-6">
											<textarea name="keterangan" class="form-control" placeholder="Keterangan" rows="3" required></textarea>
										</div>
									</div>
								</div>
								<div class="panel-footer">
									<a href="barang.php" class="btn btn-default">Batal</a>
									<button type="submit" name="simpan" class="btn btn-success pull-right">Simpan Data</button>
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