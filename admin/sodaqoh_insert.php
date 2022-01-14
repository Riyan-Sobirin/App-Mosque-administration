<?php
	include("sess_check.php");
	
	// query database memasukan data ke database
	if(isset($_POST['simpan'])) {
		$no_sodaqoh = $_POST['no_sodaqoh'];
		$id_donatur = $_POST['id_donatur'];
		$tgl_sodaqoh = $_POST['thn'] ."-". $_POST['bln'] ."-". $_POST['tgl'];
		$jumlah = $_POST['jumlah'];
		$keterangan = addslashes($_POST['keterangan']);
		
		$sql = "INSERT INTO sodaqoh (id_donatur,tgl_sodaqoh,jumlah,keterangan)VALUES('$id_donatur','$tgl_sodaqoh','$jumlah','$keterangan')";
		$ress = mysqli_query($conn, $sql);		
		
		header("location: sodaqoh.php?act=add&msg=success");
	}
?>