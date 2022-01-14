<?php
	include("sess_check.php");
	
	// query database menghapus data dari database
	if(isset($_POST['hapus'])) {
		$id_donatur = $_POST['id_donatur'];
		
		$sql = "DELETE FROM donatur WHERE id_donatur='". $id_donatur ."'";
		$ress = mysqli_query($conn, $sql);
		
		header("location: donatur.php?act=delete&msg=success");
	}
?>