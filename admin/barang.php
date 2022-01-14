<?php
	include("sess_check.php");
	
	// deskripsi halaman
	$pagedesc = "Barang";
	include("layout_top.php");
	include("dist/function/format_tanggal.php");
?>
<!-- top of file -->
		<!-- Page Content -->
		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Data Barang</h1>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<a href="barang_tambah.php" class="btn btn-success">Barang Baru</a>
							</div>
							<div class="panel-body">
								<table class="table table-striped table-bordered table-hover" id="tabel-data">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Barang</th>
											<th>Keterangan</th>
											<th width="5%">Edit</th>
											<th width="5%">Hapus</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$i = 1;
											$sql = "SELECT * FROM barang ORDER BY nama_barang ASC";
											$ress = mysqli_query($conn, $sql);
											while($data = mysqli_fetch_array($ress)) {
												echo '<tr>';
												echo '<td class="text-center">'. $i .'</td>';
												echo '<td class="text-nowrap">'. $data['nama_barang'] .'</td>';
												echo '<td>'. $data['keterangan_barang'] .'</td>';
												echo '<td class="text-center"><a href="barang_edit.php?bar='. $data['kd_barang'] .'" class="btn btn-warning btn-xs">Edit</a></td>';
												echo '<td class="text-center"><a href="barang_hapus.php?bar='. $data['kd_barang'] .'" class="btn btn-danger btn-xs">Hapus</a></td>';
												echo '</tr>';
												
												$i++;
											}
										?>
									</tbody>
								</table>
							</div>
						</div><!-- /.panel -->
					</div><!-- /.col-lg-12 -->
				</div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /#page-wrapper -->
<!-- bottom of file -->
<script type="text/javascript">
	$(document).ready(function() {
		$('#tabel-data').DataTable({
			"responsive": true,
			"processing": true,
			"columnDefs": [
				{ "orderable": false, "targets": [3,4] }
			]
		});
		
		$('#tabel-data').parent().addClass("table-responsive");
	});
</script>
<?php
	include("layout_bottom.php");
?>