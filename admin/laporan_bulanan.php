<?php
	include("sess_check.php");
	
	// deskripsi halaman
	$pagedesc = "Laporan Bulanan";
	include("layout_top.php");
	include("dist/function/format_rupiah.php");
	include("dist/function/format_tanggal.php");
	
	// parameter bulan
	$param = (isset($_GET['bln']) ? $_GET['bln'] : ceil($bulan));
	$param2 = (isset($_GET['thn']) ? $_GET['thn'] : $tahun);
	
	// keperluan rekap kas
	$param3 = $param2 ."-". $param ."-01";
	$tgl_rekaps = getdate(strtotime($param3));
	$tgl_rekap_tmp = mktime(0, 0, 0, $tgl_rekaps['mon']+1, $tgl_rekaps['mday']-1, $tgl_rekaps['year']);
	$tgl_tampil_tmp = mktime(0, 0, 0, $tgl_rekaps['mon']+1, $tgl_rekaps['mday'], $tgl_rekaps['year']);
	$tgl_rekap = date("Y-m-d", $tgl_rekap_tmp);
	$tgl_tampil = date("Y-m-d", $tgl_tampil_tmp);
	
	// variabel untuk menyimpan data
	$data = array();
	
	// data rekap kas
	$sql_kas = "SELECT * FROM rekap_kas ORDER BY tgl_rekap ASC";
	$ress_kas = mysqli_query($conn, $sql_kas);
	while($li = mysqli_fetch_array($ress_kas)) {
		$tgl_rekaps = getdate(strtotime($li['tgl_rekap']));
		$col = array();
		$col['tanggal'] = $li['tgl_tampil'];
		$col['uraian'] = "Kas/Saldo Akhir Bulan ". $bulans[$tgl_rekaps['mon']] ." ". $tgl_rekaps['year'];
		$col['sumber'] = "KAS DKM";
		$col['infaq'] = $li['infaq'];
		$col['sodaqoh'] = $li['sodaqoh'];
		$col['pemasukan'] = ($li['infaq'] + $li['sodaqoh']);
		$col['pengeluaran'] = $li['pengeluaran'];
		$data[] = $col;
	}
	
	// data sodaqoh
	$sql_sodaqoh = "SELECT * FROM sodaqoh INNER JOIN donatur ON sodaqoh.id_donatur=donatur.id_donatur ORDER BY tgl_sodaqoh ASC";
	$ress_sodaqoh = mysqli_query($conn, $sql_sodaqoh);
	while($li = mysqli_fetch_array($ress_sodaqoh)) {
		$col = array();
		$col['tanggal'] = $li['tgl_sodaqoh'];
		$col['uraian'] = $li['keterangan'];
		$col['sumber'] = $li['nama_donatur'];
		$col['infaq'] = 0;
		$col['sodaqoh'] = $li['jumlah'];
		$col['pemasukan'] = $li['jumlah'];
		$col['pengeluaran'] = "-";
		$data[] = $col;
	}
	
	// data infaq
	$sql_infaq = "SELECT * FROM infaq ORDER BY tgl_infaq ASC";
	$ress_infaq = mysqli_query($conn, $sql_infaq);
	while($li = mysqli_fetch_array($ress_infaq)) {
		$col = array();
		$col['tanggal'] = $li['tgl_infaq'];
		$col['uraian'] = $li['keterangan'];
		$col['sumber'] = $li['terima_dari'];
		$col['infaq'] = $li['jumlah'];
		$col['sodaqoh'] = 0;
		$col['pemasukan'] = $li['jumlah'];
		$col['pengeluaran'] = "-";
		$data[] = $col;
	}
	
	// data pengeluaran
	$sql_keluar = "SELECT * FROM pengeluaran ORDER BY tgl_keluar ASC";
	$ress_keluar = mysqli_query($conn, $sql_keluar);
	while($li = mysqli_fetch_array($ress_keluar)) {
		$col = array();
		$col['tanggal'] = $li['tgl_keluar'];
		$col['uraian'] = $li['keterangan'];
		$col['sumber'] = $li['jns_keluar'];
		$col['infaq'] = 0;
		$col['sodaqoh'] = 0;
		$col['pemasukan'] = "-";
		$col['pengeluaran'] = $li['jumlah'];
		$data[] = $col;
	}
	
	// sorting data berdasarkan tanggal
	sort($data);
?>
<!-- top of file -->
		<!-- Page Content -->
		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Laporan Zakat Fitrah Masjid Nurul Qomar</h1>
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
										<select name="bln" class="form-control">
											<option value="0">- Pilih Bulan -</option>
											<?php
												for($n=1; $n<$bulans_count; $n++) {
													if($param == $n) {
														echo '<option value="'. $n .'" selected>'. $bulans[$n] .'</option>';
													}
													else {
														echo '<option value="'. $n .'">'. $bulans[$n] .'</option>';
													}
												}
											?>
										</select>
									</div>
									<div class="form-group">
										<select name="thn" class="form-control">
											<option value="0">- Pilih Tahun -</option>
											<?php
												for($n=$tahun; $n>=2000; $n--) {
													if($param2 == $n) {
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
											<th>No</th>
											<th>Tanggal</th>
											<th>Keterangan</th>
											<th>Nama ( Muzaki )</th>
											<th>Pemasukan</th>
											<th>Pengeluaran</th>
											<th>Saldo</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$i = 1;
											$saldo = 0;
											$sum_infaq = 0;
											$sum_sodaqoh = 0;
											$sum_pemasukan = 0;
											$sum_pengeluaran = 0;
											foreach($data as $row) {
												$tanggal_array = getdate(strtotime($row['tanggal']));
												if($param && $param == $tanggal_array['mon'] && $param2 == $tanggal_array['year']) {
													echo '<tr>';
													echo '<td class="text-center">'. $i .'</td>';
													echo '<td class="text-center">'. format_tanggal($row['tanggal']) .'</td>';
													echo '<td>'. $row['uraian'] .'</td>';
													echo '<td>'. $row['sumber'] .'</td>';
													if($row['pemasukan'] != "-") {
														echo '<td class="text-right">'. format_rupiah_akunting($row['pemasukan']) .'</td>';
														$saldo += $row['pemasukan'];
														$sum_pemasukan += $row['pemasukan'];
														$sum_infaq += $row['infaq'];
														$sum_sodaqoh += $row['sodaqoh'];
													}
													else {
														echo '<td class="text-center">'. $row['pemasukan'] .'</td>';
													}
													if($row['pengeluaran'] != "-") {
														echo '<td class="text-right">'. format_rupiah_akunting($row['pengeluaran']) .'</td>';
														$saldo -= $row['pengeluaran'];
														$sum_pengeluaran += $row['pengeluaran'];
													}
													else {
														echo '<td class="text-center">'. $row['pengeluaran'] .'</td>';
													}
													echo '<td class="text-right">'. format_rupiah_akunting($saldo) .'</td>';
													echo '</tr>';
													
													$i++;
												}
											}
											if($i == 1) {
												echo '<tr><td colspan="7" class="text-center">-= Belum ada data =-</td></tr>';
											}
										?>
									</tbody>
									<tfoot>
										<?php
											echo '<tr>';
											echo '<th colspan="4" class="text-center">Total</th>';
											echo '<th class="text-right">'. format_rupiah_akunting($sum_pemasukan) .'</th>';
											echo '<th class="text-right">'. format_rupiah_akunting($sum_pengeluaran) .'</th>';
											echo '<th class="text-right">'. format_rupiah_akunting($saldo) .'</th>';
											echo '</tr>';
										?>
									</tfoot>
								</table>
								</div><!-- /.table-responsive -->
							</div><!-- /.panel-body -->
							<div class="panel-footer">
								<form class="form-inline" action="rekapkas_update.php" method="POST">
									<input type="hidden" name="tgl_rekap" value="<?php echo $tgl_rekap ?>">
									<input type="hidden" name="tgl_tampil" value="<?php echo $tgl_tampil ?>">
									<input type="hidden" name="infaq" value="<?php echo $sum_infaq ?>">
									<input type="hidden" name="sodaqoh" value="<?php echo $sum_sodaqoh ?>">
									<input type="hidden" name="pengeluaran" value="<?php echo $sum_pengeluaran ?>">
									<input type="hidden" name="bln_rekap" value="<?php echo $param ?>">
									<input type="hidden" name="thn_rekap" value="<?php echo $param2 ?>">
									<div class="form-group">
										<?php
											if($i == 1) {
												echo '<button type="submit" name="rekap" class="btn btn-success" disabled>Simpan Rekap</button>';
											}
											else {
												echo '<button type="submit" name="rekap" class="btn btn-success">Simpan Rekap</button>';
											}
										?>
									</div>
									<div class="form-group">
										<?php
											if($i == 1) {
												echo '<a href="laporan_bulanan_cetak.php?bln='. $param .'&thn='. $param2 .'" target="_blank" class="btn btn-primary" disabled>Cetak</a>';
												//echo '<a href="#" class="btn btn-primary" disabled>Cetak</a>';
											}
											else {
												echo '<a href="laporan_bulanan_cetak.php?bln='. $param .'&thn='. $param2 .'" target="_blank" class="btn btn-primary">Cetak</a>';
												//echo '<a href="#" class="btn btn-primary">Cetak</a>';
											}
										?>
									</div>
								</form>
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