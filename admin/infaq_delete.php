<?php
	include("sess_check.php");
	
	// query database menghapus data dari database
	if(isset($_POST['hapus'])) {
		$no_infaq = $_POST['no_infaq'];
		
		$sql = "DELETE FROM infaq WHERE no_infaq='". $no_infaq ."'";
		$ress = mysqli_query($conn, $sql);
		
		header("location: infaq.php?act=delete&msg=success");
	}
?>