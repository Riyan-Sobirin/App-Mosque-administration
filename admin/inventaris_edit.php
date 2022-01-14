<?php
	include("sess_check.php");
	
	// query database mencari data inventaris
	if(isset($_GET['inv'])) {
		$sql = "SELECT * FROM inventaris WHERE no_inventaris='". $_GET['inv'] ."'";
		$ress = mysqli_query($conn, $sql);
		$data = mysqli_fetch_array($ress);
	}
	
	// pecah tanggal
	$tgl = explode("-", $data['tgl_terima']);
	
	// deskripsi halaman
	$pagedesc = "Inventaris";
	$menuparent = "inventaris";
	include("layout_top.php");
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
						<form class="form-horizontal" action="inventaris_update.php" method="POST">
							<div class="panel panel-default">
								<div class="panel-heading"><h3>Edit Data</h3></div>
								<div class="panel-body">
									<input type="hidden" name="no_inventaris" value="<?php echo $data['no_inventaris'] ?>">
									<div class="form-group">
										<label class="control-label col-sm-3">Nama Barang</label>
										<div class="col-sm-4">
											<select name="kd_barang" class="form-control">
												<option value="0">- Pilih Nama Barang -</option>
												<?php
													$sql_barang = "SELECT * FROM barang ORDER BY nama_barang ASC";
													$ress_barang = mysqli_query($conn, $sql_barang);
													while($barang = mysqli_fetch_array($ress_barang)) {
														if($data['kd_barang'] == $barang['kd_barang']) {
															echo '<option value="'. $barang['kd_barang'] .'" selected>'. ucwords($barang['nama_barang']) .'</option>';
														}
														else {
															echo '<option value="'. $barang['kd_barang'] .'">'. ucwords($barang['nama_barang']) .'</option>';
														}
													}
												?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Tanggal</label>
										<div class="col-sm-2">
											<select name="tgl" class="form-control">
												<option value="0">- Pilih Tanggal -</option>
												<?php
													for($x=1; $x<=31; $x++) {
														if($tgl[2] == $x) {
															echo '<option value="'. $x .'" selected>'. $x .'</option>';
														}
														else {
															echo '<option value="'. $x .'">'. $x .'</option>';
														}
													}
												?>
											</select>
										</div>
										<div class="col-sm-2">
											<select name="bln" class="form-control">
												<option value="0">- Pilih Bulan -</option>
												<?php
													for($x=1; $x<$bulans_count; $x++) {
														if($tgl[1] == $x) {
															echo '<option value="'. $x .'" selected>'. $bulans[$x] .'</option>';
														}
														else {
															echo '<option value="'. $x .'">'. $bulans[$x] .'</option>';
														}
													}
												?>
											</select>
										</div>
										<div class="col-sm-2">
											<select name="thn" class="form-control">
												<option value="0">- Pilih Tahun -</option>
												<?php
													for($x=$tahun; $x>=1950; $x--) {
														if($tgl[0] == $x) {
															echo '<option value="'. $x .'" selected>'. $x .'</option>';
														}
														else {
															echo '<option value="'. $x .'">'. $x .'</option>';
														}
													}
												?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Jumlah</label>
										<div class="col-sm-2">
											<input type="number" name="jumlah" class="form-control" placeholder="Jumlah" min="0" value="<?php echo $data['jumlah'] ?>" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Keterangan</label>
										<div class="col-sm-6">
											<textarea name="keterangan" class="form-control" placeholder="Keterangan" rows="3" required><?php echo $data['keterangan'] ?></textarea>
										</div>
									</div>
								</div>
								<div class="panel-footer">
									<a href="inventaris.php" class="btn btn-default">Batal</a>
									<button type="submit" name="perbarui" class="btn btn-warning pull-right">Perbarui Data</button>
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