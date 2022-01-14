<?php
	include("sess_check.php");
	
	// query database mencari data pengeluaran
	$sql = "SELECT no_keluar FROM pengeluaran";
	$ress = mysqli_query($conn, $sql);
	$rows = mysqli_num_rows($ress);
	
	// membuat id_baru
	$newid_keluar = $rows + 1;
	
	// deskripsi halaman
	$pagedesc = "Pengeluaran";
	$menuparent = "pengeluaran";
	include("layout_top.php");
?>
<!-- top of file -->
		<!-- Page Content -->
		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Data Pengeluaran</h1>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12">
						<form class="form-horizontal" action="pengeluaran_insert.php" method="POST">
							<div class="panel panel-default">
								<div class="panel-heading"><h3>Tambah Data</h3></div>
								<div class="panel-body">
									<input type="hidden" name="no_keluar" value="<?php echo $newid_keluar ?>">
									<div class="form-group">
										<label class="control-label col-sm-3">Jenis Pengeluaran</label>
										<div class="col-sm-6">
											<input type="text" name="jns_keluar" class="form-control" placeholder="Jenis Pengeluaran" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Tanggal</label>
										<div class="col-sm-2">
											<select name="tgl" class="form-control">
												<option value="0">- Pilih Tanggal -</option>
												<?php
													for($x=1; $x<=31; $x++) {
														if($tanggal == $x) {
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
														if($bulan == $x) {
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
														if($tahun == $x) {
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
										<label class="control-label col-sm-3">Dikeluarkan Oleh</label>
										<div class="col-sm-6">
											<input type="text" name="keluar_oleh" class="form-control" placeholder="Dikeluarkan Oleh" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Jumlah</label>
										<div class="col-sm-4">
											<input type="number" name="jumlah" class="form-control" placeholder="Jumlah" min="0" required>
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
									<a href="pengeluaran.php" class="btn btn-default">Batal</a>
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