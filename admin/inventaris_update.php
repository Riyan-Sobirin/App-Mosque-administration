<?php
	include("sess_check.php");
	
	// query database memperbarui data pada database
	if(isset($_POST['perbarui'])) {
		$no_inventaris = $_POST['no_inventaris'];
		$kd_barang = $_POST['kd_barang'];
		$tgl_terima = $_POST['thn'] ."-". $_POST['bln'] ."-". $_POST['tgl'];
		$jumlah = $_POST['jumlah'];
		$keterangan = addslashes($_POST['keterangan']);
		
		$sql = "UPDATE inventaris SET
			kd_barang='". $kd_barang ."',
			tgl_terima='". $tgl_terima ."',
			jumlah='". $jumlah ."',
			keterangan='". $keterangan ."'
			WHERE no_inventaris='". $no_inventaris ."'";
		$ress = mysqli_query($conn, $sql);
		
		header("location: inventaris.php?act=update&msg=success");
	}
?>