<?php
	include("sess_check.php");
	
	// deskripsi halaman
	$pagedesc = "Inventaris";
	include("layout_top.php");
	include("dist/function/format_tanggal.php");
?>
<!-- top of file -->
		<!-- Page Content -->
		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Riwayat Penerimaan Inventaris</h1>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<a href="inventaris_tambah.php" class="btn btn-success">Inventaris Baru</a>
							</div>
							<div class="panel-body">
								<table class="table table-striped table-bordered table-hover" id="tabel-data">
									<thead>
										<tr>
											<th>No</th>
											<th>Tgl Terima</th>
											<th>Nama Barang</th>
											<th>Jumlah</th>
											<th>Keterangan</th>
											<th width="5%">Edit</th>
											<th width="5%">Hapus</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$i = 1;
											$sql = "SELECT * FROM inventaris INNER JOIN barang ON inventaris.kd_barang=barang.kd_barang ORDER BY inventaris.tgl_terima DESC";
											$ress = mysqli_query($conn, $sql);
											while($data = mysqli_fetch_array($ress)) {
												echo '<tr>';
												echo '<td class="text-center">'. $i .'</td>';
												echo '<td class="text-center text-nowrap">'. format_tanggal($data['tgl_terima']) .'</td>';
												echo '<td>'. $data['nama_barang'] .'</td>';
												echo '<td class="text-center">'. $data['jumlah'] .'</td>';
												echo '<td>'. $data['keterangan'] .'</td>';
												echo '<td class="text-center"><a href="inventaris_edit.php?inv='. $data['no_inventaris'] .'" class="btn btn-warning btn-xs">Edit</a></td>';
												echo '<td class="text-center"><a href="inventaris_hapus.php?inv='. $data['no_inventaris'] .'" class="btn btn-danger btn-xs">Hapus</a></td>';
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
				{ "orderable": false, "targets": [5,6] }
			]
		});
		
		$('#tabel-data').parent().addClass("table-responsive");
	});
</script>
<?php
	include("layout_bottom.php");
?>