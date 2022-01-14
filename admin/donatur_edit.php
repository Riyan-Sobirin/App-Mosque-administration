<?php
	include("sess_check.php");
	
	// query database mencari data donatur
	if(isset($_GET['don'])) {
		$sql = "SELECT * FROM donatur WHERE id_donatur='". $_GET['don'] ."'";
		$ress = mysqli_query($conn, $sql);
		$data = mysqli_fetch_array($ress);
	}
	
	// pecah tanggal lahir
	$tgl_lahir = explode("-", $data['tgl_lahir']);
	
	// deskripsi halaman
	$pagedesc = "Donatur";
	$menuparent = "donatur";
	include("layout_top.php");
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
						<form class="form-horizontal" action="donatur_update.php" method="POST">
							<div class="panel panel-default">
								<div class="panel-heading"><h3>Edit Data</h3></div>
								<div class="panel-body">
									<div class="form-group">
										<label class="control-label col-sm-3">Nama Donatur</label>
										<div class="col-sm-6">
											<input type="text" name="nama_donatur" class="form-control" placeholder="Nama Donatur" value="<?php echo $data['nama_donatur'] ?>" required>
											<input type="hidden" name="id_donatur" value="<?php echo $data['id_donatur'] ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Tempat Lahir</label>
										<div class="col-sm-4">
											<input type="text" name="tpt_lahir" class="form-control" placeholder="Tempat Lahir" value="<?php echo $data['tpt_lahir'] ?>" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Tanggal Lahir</label>
										<div class="col-sm-2">
											<select name="tgl_lahir" class="form-control">
												<option value="0">- Pilih Tanggal -</option>
												<?php
													for($x=1; $x<=31; $x++) {
														if($tgl_lahir[2] == $x) {
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
											<select name="bln_lahir" class="form-control">
												<option value="0">- Pilih Bulan -</option>
												<?php
													for($x=1; $x<$bulans_count; $x++) {
														if($tgl_lahir[1] == $x) {
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
											<select name="thn_lahir" class="form-control">
												<option value="0">- Pilih Tahun -</option>
												<?php
													for($x=$tahun; $x>=1950; $x--) {
														if($tgl_lahir[0] == $x) {
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
										<label class="control-label col-sm-3">Jenis Kelamin</label>
										<div class="col-sm-2">
											<select name="j_kelamin" class="form-control">
												<option value="0">- Pilih Jenis Kelamin -</option>
												<?php
													if($data['j_kelamin'] == "Laki-laki") {
														echo '<option value="Laki-laki" selected>Laki-laki</option>';
														echo '<option value="Perempuan">Perempuan</option>';
													}
													else {
														echo '<option value="Laki-laki">Laki-laki</option>';
														echo '<option value="Perempuan" selected>Perempuan</option>';
													}
												?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Alamat</label>
										<div class="col-sm-6">
											<textarea name="alamat" class="form-control" placeholder="Alamat" rows="3" required><?php echo $data['alamat'] ?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Telepon</label>
										<div class="col-sm-4">
											<input type="text" name="telepon" class="form-control" placeholder="Telepon" value="<?php echo $data['telepon'] ?>" required>
										</div>
									</div>
								</div>
								<div class="panel-footer">
									<a href="donatur.php" class="btn btn-default">Batal</a>
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