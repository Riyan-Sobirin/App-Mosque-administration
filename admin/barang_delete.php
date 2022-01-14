<?php
	include("sess_check.php");
	
	// query database menghapus data dari database
	if(isset($_POST['hapus'])) {
		$kd_barang = $_POST['kd_barang'];
		
		$sql = "DELETE FROM barang WHERE kd_barang='". $kd_barang ."'";
		$ress = mysqli_query($conn, $sql);
		
		header("location: barang.php?act=delete&msg=success");
	}
?>