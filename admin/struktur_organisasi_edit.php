<?php
	include("sess_check.php");
	
	// query database mencari data struktur organisasi
	if(isset($_GET['org'])) {
		$sql = "SELECT * FROM konten_organisasi WHERE id_konten='". $_GET['org'] ."'";
		$ress = mysqli_query($conn, $sql);
		$data = mysqli_fetch_array($ress);
	}
	
	// deskripsi halaman
	$pagedesc = $data['judul_konten'];
	$menuparent = "konten_organisasi";
	include("layout_top.php");
?>
<!-- top of file -->
		<!-- Page Content -->
		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><?php echo $data['judul_konten'] ?></h1>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12">
						<form action="struktur_organisasi_update.php" method="POST">
							<div class="panel panel-default">
								<div class="panel-heading"><h3>Edit Konten</h3></div>
								<div class="panel-body">
									<div class="form-group">
										<label class="control-label">Judul Konten</label>
										<input type="text" name="judul_konten" class="form-control" placeholder="Judul Konten" value="<?php echo $data['judul_konten'] ?>" required>
										<input type="hidden" name="id_konten" value="<?php echo $data['id_konten'] ?>">
									</div>
									<div class="form-group">
										<label class="control-label">Menu Konten</label>
										<input type="text" name="menu_konten" class="form-control" placeholder="Menu Konten" value="<?php echo $data['menu_konten'] ?>" required>
									</div>
									<div class="form-group">
										<label class="control-label">Isi Konten</label>
										<textarea name="isi_konten" id="isi_konten" class="form-control" rows="16" placeholder="Isi Konten" required><?php echo $data['isi_konten'] ?></textarea>
									</div>
								</div><!-- /. panel-body -->
								<div class="panel-footer">
									<a href="struktur_organisasi.php?org=<?php echo $data['id_konten'] ?>" class="btn btn-default">Batal</a>
									<button type="submit" name="perbarui" class="btn btn-warning pull-right">Simpan Perubahan</button>
								</div>
							</div><!-- /.panel -->
						</form>
					</div><!-- /.col-lg-12 -->
				</div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /#page-wrapper -->
<!-- bottom of file -->
<script type="text/javascript" src="libs/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
	CKEDITOR.replace( 'isi_konten', {
		toolbar: [
			{ name: 'document', groups: [ 'source', 'savenew' ], items: [ 'Source', '-', 'Save', 'NewPage' ] },
			{ name: 'clipboard', groups: [ 'cutcopypaste', 'undoredo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', '-', 'Undo', 'Redo' ] },
			{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'bidi' ], items: [ 'BulletedList', 'NumberedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', '-', 'BidiLtr', 'BidiRtl' ] },
			{ name: 'insert', items: [ 'Table', 'HorizontalRule', 'SpecialChar', 'PageBreak' ] },
			'/',
			{ name: 'styles', items: [ 'Format', 'Font', 'FontSize' ] },
			{ name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', 'RemoveFormat' ] },
			{ name: 'align', items: [  'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
			{ name: 'others', items: [ '-' ] },
			{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
			{ name: 'about', items: [ 'About' ] }
		]
	});
</script>
<?php
	include("layout_bottom.php");
?>