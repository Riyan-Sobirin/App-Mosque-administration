<?php
	include("sess_check.php");
	
	// query database mencari data struktur organisasi
	if(isset($_POST['perbarui'])) {
		$id_konten = $_POST['id_konten'];
		$judul_konten = addslashes($_POST['judul_konten']);
		$isi_konten = addslashes($_POST['isi_konten']);
		$menu_konten = addslashes($_POST['menu_konten']);
		
		$sql = "UPDATE konten_organisasi SET
			judul_konten='". $judul_konten ."',
			isi_konten='". $isi_konten ."',
			menu_konten='". $menu_konten ."'
			WHERE id_konten='". $id_konten ."'";
		$ress = mysqli_query($conn, $sql);
		
		header("location: struktur_organisasi.php?org=". $id_konten ."&act=update&msg=success");
	}
?>