<?php
	include("sess_check.php");
	
	// query database memasukan data ke database
	if(isset($_POST['simpan'])) {
		$kd_barang = $_POST['kd_barang'];
		$nama_barang = addslashes($_POST['nama_barang']);
		$keterangan = addslashes($_POST['keterangan']);
		
		$sql = "INSERT INTO barang (nama_barang, keterangan_barang) VALUES ('$nama_barang','$keterangan')";
		$ress = mysqli_query($conn, $sql);		
		
		header("location: barang.php?act=add&msg=success");
	}
?>