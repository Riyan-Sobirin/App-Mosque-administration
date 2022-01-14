<?php
	include("sess_check.php");
	
	// deskripsi halaman
	$pagedesc = "Laporan Tahunan";
	include("layout_top.php");
	include("dist/function/format_rupiah.php");
	include("dist/function/format_tanggal.php");
	
	// parameter tahun
	$param = (isset($_GET['thn']) ? $_GET['thn'] : $tahun);
	
	// variabel untuk menyimpan data
	$rekap = array();
	
	// data rekap kas
	$sql_kas = "SELECT * FROM rekap_kas ORDER BY tgl_rekap ASC";
	$ress_kas = mysqli_query($conn, $sql_kas);
	while($li = mysqli_fetch_array($ress_kas)) {
		$tgl_tmp = getdate(strtotime($li['tgl_rekap']));
		$col = array();
		$col['tanggal'] = $li['tgl_rekap'];
		$col['infaq'] = $li['infaq'];
		$col['sodaqoh'] = $li['sodaqoh'];
		$col['pemasukan'] = ($li['infaq'] + $li['sodaqoh']);
		$col['pengeluaran'] = $li['pengeluaran'];
		$col['saldo'] = $col['pemasukan'] - $col['pengeluaran'];
		// var rekap[mm][yyyy] = array col
		$rekap[$tgl_tmp['year']][$tgl_tmp['mon']] = $col;
	}
?>
<!-- top of file -->
		<!-- Page Content -->
		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Laporan Kas Tahunan</h1>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<form class="form-inline" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
									<div class="form-group">
										<select name="thn" class="form-control">
											<option value="0">- Pilih Tahun -</option>
											<?php
												for($n=$tahun; $n>=2000; $n--) {
													if($param == $n) {
														echo '<option value="'. $n .'" selected>'. $n .'</option>';
													}
													else {
														echo '<option value="'. $n .'">'. $n .'</option>';
													}
												}
											?>
										</select>
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-default">Tampilkan</button>
									</div>
								</form>
							</div>
							<div class="panel-body">
								<div class="table-responsive">
								<table class="table table-striped table-bordered">
									<thead>
										<tr>
											<th rowspan="2">Uraian</th>
											<th colspan="12"><?php echo $param ?></th>
										</tr>
										<tr>
											<?php
												for($x=1; $x<$bulans_count; $x++) {											
													echo '<th>'. $bulans[$x] .'</th>';
												}
											?>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Penerimaan Infaq</td>
											<?php
												for($x=1; $x<$bulans_count; $x++) {
													if(isset($rekap[$param][$x]['infaq'])) {
														echo '<td>'. format_rupiah_akunting($rekap[$param][$x]['infaq']) .'</td>';
													}
													else {
														echo '<td class="text-center">-</td>';
													}
												}
											?>
										</tr>
										<tr>
											<td>Penerimaan Shodaqoh</td>
											<?php
												for($x=1; $x<$bulans_count; $x++) {
													if(isset($rekap[$param][$x]['sodaqoh'])) {
														echo '<td>'. format_rupiah_akunting($rekap[$param][$x]['sodaqoh']) .'</td>';
													}
													else {
														echo '<td class="text-center">-</td>';
													}
												}
											?>
										</tr>
										<tr class="success">
											<td>Total Pemasukan</td>
											<?php
												for($x=1; $x<$bulans_count; $x++) {
													if(isset($rekap[$param][$x]['pemasukan'])) {
														echo '<td>'. format_rupiah_akunting($rekap[$param][$x]['pemasukan']) .'</td>';
													}
													else {
														echo '<td class="text-center">-</td>';
													}
												}
											?>
										</tr>
										<tr class="danger">
											<td>Total Pengeluaran</td>
											<?php
												for($x=1; $x<$bulans_count; $x++) {
													if(isset($rekap[$param][$x]['pengeluaran'])) {
														echo '<td>'. format_rupiah_akunting($rekap[$param][$x]['pengeluaran']) .'</td>';
													}
													else {
														echo '<td class="text-center">-</td>';
													}
												}
											?>
										</tr>
									</tbody>
									<tfoot>
										<tr class="warning">
											<th>Total Saldo</th>
											<?php
												for($x=1; $x<$bulans_count; $x++) {
													if(isset($rekap[$param][$x]['saldo'])) {
														echo '<th>'. format_rupiah_akunting($rekap[$param][$x]['saldo']) .'</th>';
													}
													else {
														echo '<th class="text-center">-</th>';
													}
												}
											?>
										</tr>
									</tfoot>
								</table>
								</div><!-- /.table-responsive -->
							</div><!-- /.panel-body -->
							<div class="panel-footer">
								<a href="laporan_tahunan_cetak.php?thn=<?php echo $param ?>" target="_blank" class="btn btn-primary">Cetak</a>
								<!-- a href="#" class="btn btn-primary">Cetak</a -->
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