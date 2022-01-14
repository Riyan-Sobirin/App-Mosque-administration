<?php
	include("sess_check.php");
	
	// deskripsi halaman
	$pagedesc = "Laporan Inventaris";
	include("layout_top.php");
	include("admin/dist/function/format_tanggal.php");
	
	// data inventaris
	$data = array();
	$sql = "SELECT * FROM inventaris INNER JOIN barang ON inventaris.kd_barang=barang.kd_barang ORDER BY inventaris.tgl_terima DESC";
	$ress = mysqli_query($conn, $sql);
	while($li = mysqli_fetch_array($ress)) {
		$col = array();
		$col['tanggal'] = $li['tgl_terima'];
		$col['nama'] = $li['nama_barang'];
		$col['jumlah'] = $li['jumlah'];
		$col['keterangan'] = $li['keterangan'];
		$data[] = $col;
	}
?>
<!-- top of file -->
		<!-- Page Content -->
		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Laporan Inventaris</h1>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-body">
								<div class="table-responsive">
								<table class="table table-striped table-bordered">
									<thead>
										<tr>
											<th>No</th>
											<th>Tgl Terima</th>
											<th>Nama Barang</th>
											<th>Jumlah</th>
											<th>Keterangan</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$i = 1;
											foreach($data as $row) {
												echo '<tr>';
												echo '<td class="text-center">'. $i .'</td>';
												echo '<td class="text-center">'. format_tanggal($row['tanggal']) .'</td>';
												echo '<td>'. $row['nama'] .'</td>';
												echo '<td class="text-center">'. $row['jumlah'] .'</td>';
												echo '<td>'. $row['keterangan'] .'</td>';
												echo '</tr>';

												$i++;
											}
											if($i == 1) {
												echo '<tr><td colspan="5" class="text-center">-= Belum ada data =-</td></tr>';
											}
										?>
									</tbody>
								</table>
								</div><!-- /.table-responsive -->
							</div><!-- /.panel-body -->
							<div class="panel-footer">
								<?php
									if($i == 1) {
										echo '<a href="laporan_inventaris_cetak.php" target="_blank" class="btn btn-primary" disabled>Cetak</a>';
										//echo '<a href="#" class="btn btn-primary" disabled>Cetak</a>';
									}
									else {
										echo '<a href="laporan_inventaris_cetak.php" target="_blank" class="btn btn-primary">Cetak</a>';
										//echo '<a href="#" class="btn btn-primary">Cetak</a>';
									}
								?>
							</div><!-- /.panel-footer -->
						</div><!-- /.panel -->
					</div><!-- /.col-lg-12 -->
				</div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /#page-wrapper -->
<!-- bottom of file -->
<?php
	include("layout_bottom.php");
?>