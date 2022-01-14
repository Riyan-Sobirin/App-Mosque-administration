<?php
	include("sess_check.php");
	
	// query database mencari data sodaqoh
	if(isset($_GET['sod'])) {
		$sql = "SELECT * FROM sodaqoh INNER JOIN donatur ON sodaqoh.id_donatur=donatur.id_donatur WHERE sodaqoh.no_sodaqoh='". $_GET['sod'] ."'";
		$ress = mysqli_query($conn, $sql);
		$data = mysqli_fetch_array($ress);
	}
	
	// deskripsi halaman
	$pagedesc = "Shodaqoh";
	$menuparent = "penerimaan";
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
                        <h1 class="page-header">Data Penerimaan Shodaqoh</h1>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12">
						<form class="form-horizontal" action="sodaqoh_delete.php" method="POST">
							<div class="panel panel-default">
								<div class="panel-heading"><h3>Hapus Data</h3></div>
								<div class="panel-body">
									<input type="hidden" name="no_sodaqoh" value="<?php echo $data['no_sodaqoh'] ?>">
									<div class="form-group">
										<label class="control-label col-sm-3">Nomor Transaksi :</label>
										<div class="col-sm-6">
											<p class="form-control-static"><?php echo format_nomor("SOD", $data['no_sodaqoh']) ?></p>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Tanggal :</label>
										<div class="col-sm-6">
											<p class="form-control-static"><?php echo format_tanggal($data['tgl_sodaqoh']) ?></p>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Diterima Dari :</label>
										<div class="col-sm-6">
											<p class="form-control-static"><?php echo $data['nama_donatur'] ?></p>
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
									<a href="sodaqoh.php" class="btn btn-default">Batal</a>
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