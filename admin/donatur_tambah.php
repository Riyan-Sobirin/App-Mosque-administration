<?php
	include("sess_check.php");
	
	// query database mencari data donatur
	$sql = "SELECT id_donatur FROM donatur";
	$ress = mysqli_query($conn, $sql);
	$rows = mysqli_num_rows($ress);
	
	// membuat id_baru
	$newid_donatur = $rows + 1;
	
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
						<form class="form-horizontal" action="donatur_insert.php" method="POST">
							<div class="panel panel-default">
								<div class="panel-heading"><h3>Tambah Data</h3></div>
								<div class="panel-body">
									<div class="form-group">
										<label class="control-label col-sm-3">Nama Donatur</label>
										<div class="col-sm-6">
											<input type="text" name="nama_donatur" class="form-control" placeholder="Nama Donatur" required>
											<input type="hidden" name="id_donatur" value="<?php echo $newid_donatur ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Tempat Lahir</label>
										<div class="col-sm-4">
											<input type="text" name="tpt_lahir" class="form-control" placeholder="Tempat Lahir" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Tanggal Lahir</label>
										<div class="col-sm-2">
											<select name="tgl_lahir" class="form-control">
												<option value="0">- Pilih Tanggal -</option>
												<?php
													for($x=1; $x<=31; $x++) {
														echo '<option value="'. $x .'">'. $x .'</option>';
													}
												?>
											</select>
										</div>
										<div class="col-sm-2">
											<select name="bln_lahir" class="form-control">
												<option value="0">- Pilih Bulan -</option>
												<?php
													for($x=1; $x<$bulans_count; $x++) {
														echo '<option value="'. $x .'">'. $bulans[$x] .'</option>';
													}
												?>
											</select>
										</div>
										<div class="col-sm-2">
											<select name="thn_lahir" class="form-control">
												<option value="0">- Pilih Tahun -</option>
												<?php
													for($x=$tahun; $x>=1950; $x--) {
														echo '<option value="'. $x .'">'. $x .'</option>';
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
												<option value="Laki-laki">Laki-laki</option>
												<option value="Perempuan">Perempuan</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Alamat</label>
										<div class="col-sm-6">
											<textarea name="alamat" class="form-control" placeholder="Alamat" rows="3" required></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Telepon</label>
										<div class="col-sm-4">
											<input type="number" name="telepon" class="form-control" placeholder="Telepon" required>
										</div>
									</div>
								</div>
								<div class="panel-footer">
									<a href="donatur.php" class="btn btn-default">Batal</a>
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