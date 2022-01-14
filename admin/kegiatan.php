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
                        <h1 class="page-header">Data Kegiatan</h1>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<a href="kegiatan_tambah.php" class="btn btn-success">Tambah</a>
							</div>
							<div class="panel-body">
								<table class="table table-striped table-bordered table-hover" id="tabel-data">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Kegiatan</th>
											<th>Tanggal</th>
											<th>Keterangan</th>
											<th width="5%">Edit</th>
											<th width="5%">Hapus</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$i = 1;
											$sql = "SELECT * FROM kegiatan ORDER BY keg_tgl DESC";
											$ress = mysqli_query($conn, $sql);
											while($data = mysqli_fetch_array($ress)) {
												echo '<tr>';
												echo '<td class="text-center">'. $i .'</td>';
												echo '<td class="text-nowrap">'. $data['keg_nama'] .'</td>';
												echo '<td>'. format_tanggal($data['keg_tgl']) .'</td>';
												echo '<td class="text-nowrap">'. $data['keg_ket'] .'</td>';
												echo '<td class="text-center"><a href="kegiatan_edit.php?keg='. $data['keg_id'] .'" class="btn btn-warning btn-xs">Edit</a></td>';
												echo '<td class="text-center"><a href="kegiatan_hapus.php?keg='. $data['keg_id'] .'" class="btn btn-danger btn-xs">Hapus</a></td>';
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
				{ "orderable": false, "targets": [4,5] }
			]
		});
		
		$('#tabel-data').parent().addClass("table-responsive");
	});
</script>
<?php
	include("layout_bottom.php");
?>