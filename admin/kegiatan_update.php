<?php
	include("sess_check.php");
	
	// query database memperbarui data pada database
	if(isset($_POST['perbarui'])) {
		$id = $_POST['id'];
		$nama = addslashes($_POST['nama']);
		$tgl = addslashes($_POST['tgl']);
		$keterangan = addslashes($_POST['keterangan']);
		
		$sql = "UPDATE kegiatan SET
			keg_nama='". $nama ."',
			keg_tgl='". $tgl ."',
			keg_ket='". $keterangan ."'
			WHERE keg_id='". $id ."'";
		$ress = mysqli_query($conn, $sql);
		
		header("location: kegiatan.php?act=update&msg=success");
	}
?>