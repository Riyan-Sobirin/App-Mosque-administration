<?php
	include("sess_check.php");
	
	// deskripsi halaman
	$pagedesc = "Donatur";
	include("layout_top.php");
	include("dist/function/format_tanggal.php");
?>
<!-- top of file -->
		<!-- Page Content -->
		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Data Donatur</h1>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<a href="donatur_tambah.php" class="btn btn-success">Donatur Baru</a>
							</div>
							<div class="panel-body">
								<table class="table table-striped table-bordered table-hover" id="tabel-data">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Donatur</th>
											<th>Tempat/Tgl Lahir</th>
											<th>Jns Kelamin</th>
											<th>Alamat</th>
											<th>Telepon</th>
											<th width="5%">Edit</th>
											<th width="5%">Hapus</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$i = 1;
											$sql = "SELECT * FROM donatur WHERE id_donatur!='9999' ORDER BY nama_donatur ASC";
											$ress = mysqli_query($conn, $sql);
											while($data = mysqli_fetch_array($ress)) {
												echo '<tr>';
												echo '<td class="text-center">'. $i .'</td>';
												echo '<td class="text-nowrap">'. $data['nama_donatur'] .'</td>';
												echo '<td>'. format_tanggal_lahir($data['tpt_lahir'], $data['tgl_lahir']) .'</td>';
												echo '<td class="text-center">'. $data['j_kelamin'] .'</td>';
												echo '<td>'. $data['alamat'] .'</td>';
												echo '<td class="text-center">'. $data['telepon'] .'</td>';
												echo '<td class="text-center"><a href="donatur_edit.php?don='. $data['id_donatur'] .'" class="btn btn-warning btn-xs">Edit</a></td>';
												echo '<td class="text-center"><a href="donatur_hapus.php?don='. $data['id_donatur'] .'" class="btn btn-danger btn-xs">Hapus</a></td>';
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
				{ "orderable": false, "targets": [6,7] }
			]
		});
		
		$('#tabel-data').parent().addClass("table-responsive");
	});
</script>
<?php
	include("layout_bottom.php");
?>