<?php
	include("sess_check.php");
	
	// query database menghapus data dari database
	if(isset($_POST['hapus'])) {
		$no_keluar = $_POST['no_keluar'];
		
		$sql = "DELETE FROM pengeluaran WHERE no_keluar='". $no_keluar ."'";
		$ress = mysqli_query($conn, $sql);		
		
		header("location: pengeluaran.php?act=delete&msg=success");
	}
?>