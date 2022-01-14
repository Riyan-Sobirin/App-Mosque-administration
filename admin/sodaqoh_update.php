<?php
	include("sess_check.php");
	
	// query database memperbarui data pada database
	if(isset($_POST['perbarui'])) {
		$no_sodaqoh = $_POST['no_sodaqoh'];
		$id_donatur = $_POST['id_donatur'];
		$tgl_sodaqoh = $_POST['thn'] ."-". $_POST['bln'] ."-". $_POST['tgl'];
		$jumlah = $_POST['jumlah'];
		$keterangan = addslashes($_POST['keterangan']);
		
		$sql = "UPDATE sodaqoh SET
			id_donatur='". $id_donatur ."',
			tgl_sodaqoh='". $tgl_sodaqoh ."',
			jumlah='". $jumlah ."',
			keterangan='". $keterangan ."'
			WHERE no_sodaqoh='". $no_sodaqoh ."'";
		$ress = mysqli_query($conn, $sql);		
		
		header("location: sodaqoh.php?act=update&msg=success");
	}
?>