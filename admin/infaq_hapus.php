<?php
	include("sess_check.php");
	
	// query database mencari data infaq
	if(isset($_GET['inf'])) {
		$sql = "SELECT * FROM infaq WHERE no_infaq='". $_GET['inf'] ."'";
		$ress = mysqli_query($conn, $sql);
		$data = mysqli_fetch_array($ress);
	}
	
	// deskripsi halaman
	$pagedesc = "Infaq";
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
                        <h1 class="page-header">Data Penerimaan Infaq</h1>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12">
						<form class="form-horizontal" action="infaq_delete.php" method="POST">
							<div class="panel panel-default">
								<div class="panel-heading"><h3>Hapus Data</h3></div>
								<div class="panel-body">
									<input type="hidden" name="no_infaq" value="<?php echo $data['no_infaq'] ?>">
									<div class="form-group">
										<label class="control-label col-sm-3">Nomor Transaksi :</label>
										<div class="col-sm-2">
											<p class="form-control-static"><?php echo format_nomor("INF", $data['no_infaq']) ?></p>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Tanggal :</label>
										<div class="col-sm-6">
											<p class="form-control-static"><?php echo format_tanggal($data['tgl_infaq']) ?></p>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Diterima Dari :</label>
										<div class="col-sm-6">
											<p class="form-control-static"><?php echo $data['terima_dari'] ?></p>
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
										<div class="col-sm-6">
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
									<a href="infaq.php" class="btn btn-default">Batal</a>
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