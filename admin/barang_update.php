<?php
	include("sess_check.php");
	
	// query database memperbarui data pada database
	if(isset($_POST['perbarui'])) {
		$kd_barang = $_POST['kd_barang'];
		$nama_barang = addslashes($_POST['nama_barang']);
		$keterangan = addslashes($_POST['keterangan']);
		
		$sql = "UPDATE barang SET
			nama_barang='". $nama_barang ."',
			keterangan_barang='". $keterangan ."'
			WHERE kd_barang='". $kd_barang ."'";
		$ress = mysqli_query($conn, $sql);
		
		header("location: barang.php?act=update&msg=success");
	}
?>