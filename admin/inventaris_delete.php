<?php
	include("sess_check.php");
	
	// query database menghapus data dari database
	if(isset($_POST['hapus'])) {
		$no_inventaris = $_POST['no_inventaris'];
		
		$sql = "DELETE FROM inventaris WHERE no_inventaris='". $no_inventaris ."'";
		$ress = mysqli_query($conn, $sql);
		
		header("location: inventaris.php?act=delete&msg=success");
	}
?>