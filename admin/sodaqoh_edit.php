<?php
	include("sess_check.php");
	
	// query database mencari data sodaqoh
	if(isset($_GET['sod'])) {
		$sql = "SELECT * FROM sodaqoh WHERE no_sodaqoh='". $_GET['sod'] ."'";
		$ress = mysqli_query($conn, $sql);
		$data = mysqli_fetch_array($ress);
	}
	
	// pecah tanggal
	$tgl = explode("-", $data['tgl_sodaqoh']);
	
	// deskripsi halaman
	$pagedesc = "Shodaqoh";
	$menuparent = "penerimaan";
	include("layout_top.php");
?>
<!-- top of file -->
		<!-- Page Content -->
		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Data Penerimaan Shodaqoh</h1>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12">
						<form class="form-horizontal" action="sodaqoh_update.php" method="POST">
							<div class="panel panel-default">
								<div class="panel-heading"><h3>Edit Data</h3></div>
								<div class="panel-body">
									<input type="hidden" name="no_sodaqoh" value="<?php echo $data['no_sodaqoh'] ?>">
									<div class="form-group">
										<label class="control-label col-sm-3">Donatur</label>
										<div class="col-sm-6">
											<select name="id_donatur" class="form-control">
												<option value="0">- Pilih Donatur -</option>
												<?php
													$sql_don = "SELECT * FROM donatur WHERE id_donatur!='9999' ORDER BY nama_donatur ASC";
													$ress_don = mysqli_query($conn, $sql_don);
													while($li = mysqli_fetch_array($ress_don)) {
														if($data['id_donatur'] == $li['id_donatur']) {
															echo '<option value="'. $li['id_donatur'] .'" selected>'. $li['nama_donatur'] ." / ". $li['alamat'] .'</option>';
														}
														else {
															echo '<option value="'. $li['id_donatur'] .'">'. $li['nama_donatur'] ." / ". $li['alamat'] .'</option>';
														}
													}
													$sql_don = "SELECT * FROM donatur WHERE id_donatur='9999'";
													$ress_don = mysqli_query($conn, $sql_don);
													$don = mysqli_fetch_array($ress_don);
													if($data['id_donatur'] == $don['id_donatur']) {
														echo '<option value="'. $don['id_donatur'] .'" selected>'. $don['nama_donatur'] ." / ". $don['alamat'] .'</option>';
													}
													else {
														echo '<option value="'. $don['id_donatur'] .'">'. $don['nama_donatur'] ." / ". $don['alamat'] .'</option>';
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
										<div class="col-sm-4">
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
									<a href="sodaqoh.php" class="btn btn-default">Batal</a>
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