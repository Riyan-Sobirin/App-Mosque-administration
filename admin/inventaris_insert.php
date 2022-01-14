<?php
	include("sess_check.php");
	
	// query database memasukan data ke database
	if(isset($_POST['simpan'])) {
		$no_inventaris = $_POST['no_inventaris'];
		$kd_barang = $_POST['kd_barang'];
		$tgl_terima = $_POST['thn'] ."-". $_POST['bln'] ."-". $_POST['tgl'];
		$jumlah = $_POST['jumlah'];
		$keterangan = addslashes($_POST['keterangan']);
		
		$sql = "INSERT INTO inventaris (kd_barang,tgl_terima,jumlah,keterangan) VALUES ('$kd_barang','$tgl_terima','$jumlah','$keterangan')";
		$ress = mysqli_query($conn, $sql);
		
		header("location: inventaris.php?act=add&msg=success");
	}
?>