<?php
	include("sess_check.php");
	
	// query database memasukan data ke database
	if(isset($_POST['simpan'])) {
		$no_infaq = $_POST['no_infaq'];
		$jns_infaq = $_POST['jns_infaq'];
		$tgl_infaq = $_POST['thn'] ."-". $_POST['bln'] ."-". $_POST['tgl'];
		$terima_dari = addslashes($_POST['terima_dari']);
		$jumlah = $_POST['jumlah'];
		$keterangan = addslashes($_POST['keterangan']);
		
		$sql = "INSERT INTO infaq (jns_infaq,terima_dari,tgl_infaq,jumlah,keterangan)VALUES('$jns_infaq','$terima_dari','$tgl_infaq','$jumlah','$keterangan')";

		$ress = mysqli_query($conn, $sql);
		
		header("location: infaq.php?act=add&msg=success");
	}
?>