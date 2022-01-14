<?php
	include("sess_check.php");
	
	// query database mencari data infaq
	if(isset($_GET['inf'])) {
		$sql = "SELECT * FROM infaq WHERE no_infaq='". $_GET['inf'] ."'";
		$ress = mysqli_query($conn, $sql);
		$data = mysqli_fetch_array($ress);
	}
	
	// pecah tanggal
	$tgl = explode("-", $data['tgl_infaq']);
	
	// deskripsi halaman
	$pagedesc = "Infaq";
	$menuparent = "penerimaan";
	include("layout_top.php");
?>
<!-- top of file -->
		<!-- Page Content -->
		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Data Penerimaan Infaq</h1>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12">
						<form class="form-horizontal" action="infaq_update.php" method="POST">
							<div class="panel panel-default">
								<div class="panel-heading"><h3>Edit Data</h3></div>
								<div class="panel-body">
									<input type="hidden" name="no_infaq" value="<?php echo $data['no_infaq'] ?>">
									<div class="form-group">
										<label class="control-label col-sm-3">Jenis Infaq</label>
										<div class="col-sm-2">
											<select name="jns_infaq" class="form-control">
												<option value="0">- Pilih Jenis Infaq -</option>
												<?php
													$infaqs = array("jumat",  "zakat");
													foreach($infaqs as $li) {
														if($data['jns_infaq'] == $li) {
															echo '<option value="'. $li .'" selected>Infaq '. ucfirst($li) .'</option>';
														}
														else {
															echo '<option value="'. $li .'">Infaq '. ucfirst($li) .'</option>';
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
										<label class="control-label col-sm-3">Diterima Dari</label>
										<div class="col-sm-6">
											<input type="text" name="terima_dari" class="form-control" placeholder="Diterima Dari" value="<?php echo $data['terima_dari'] ?>" required>
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
									<a href="infaq.php" class="btn btn-default">Batal</a>
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