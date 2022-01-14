<?php
	include("sess_check.php");
	
	// query database mencari data pengeluaran
	if(isset($_GET['kel'])) {
		$sql = "SELECT * FROM pengeluaran WHERE no_keluar='". $_GET['kel'] ."'";
		$ress = mysqli_query($conn, $sql);
		$data = mysqli_fetch_array($ress);
	}
	
	// deskripsi halaman
	$pagedesc = "Pengeluaran";
	$menuparent = "pengeluaran";
	include("layout_top.php");
	include("dist/function/format_nomor.php");
	include("dist/function/format_tanggal.php");
	include("dist/function/format_rupiah.php");
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
						<form class="form-horizontal" action="pengeluaran_delete.php" method="POST">
							<div class="panel panel-default">
								<div class="panel-heading"><h3>Hapus Data</h3></div>
								<div class="panel-body">
									<input type="hidden" name="no_keluar" value="<?php echo $data['no_keluar'] ?>">
									<div class="form-group">
										<label class="control-label col-sm-3">Nomor Transaksi :</label>
										<div class="col-sm-6">
											<p class="form-control-static"><?php echo format_nomor("PNG", $data['no_keluar']) ?></p>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Jenis Pengeluaran :</label>
										<div class="col-sm-6">
											<p class="form-control-static"><?php echo $data['jns_keluar'] ?></p>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Tanggal :</label>
										<div class="col-sm-6">
											<p class="form-control-static"><?php echo format_tanggal($data['tgl_keluar']) ?></p>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Dikeluarkan Oleh :</label>
										<div class="col-sm-6">
											<p class="form-control-static"><?php echo $data['keluar_oleh'] ?></p>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Jumlah :</label>
										<div class="col-sm-4">
											<p class="form-control-static"><?php echo format_rupiah($data['jumlah']) ?></p>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Terbilang :</label>
										<div class="col-sm-4">
											<input type="hidden" id="jumlah" value="<?php echo $data['jumlah'] ?>">
											<p class="form-control-static" id="jumlah2"></p>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Keterangan :</label>
										<div class="col-sm-6">
											<p class="form-control-static"><?php echo $data['keterangan'] ?></p>
										</div>
									</div>
								</div>
								<div class="panel-footer">
									<a href="pengeluaran.php" class="btn btn-default">Batal</a>
									<button type="submit" name="hapus" class="btn btn-danger pull-right">Hapus Data</button>
								</div>
							</div><!-- /.panel -->
						</form>
					</div><!-- /.col-lg-12 -->
				</div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /#page-wrapper -->
<!-- bottom of file -->
<script type="text/javascript">
	$(document).ready(function() {
		$('#jumlah').terbilang({
			'style'			: 1, 
			'output_div' 	: "jumlah2",
			'akhiran'		: "Rupiah",
		});
	});
</script>
<?php
	include("layout_bottom.php");
?>