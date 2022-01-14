<?php
	include("sess_check.php");
	
	// query database menghapus data dari database
	if(isset($_POST['hapus'])) {
		$no_sodaqoh = $_POST['no_sodaqoh'];
		
		$sql = "DELETE FROM sodaqoh WHERE no_sodaqoh='". $no_sodaqoh ."'";
		$ress = mysqli_query($conn, $sql);		
		
		header("location: sodaqoh.php?act=delete&msg=success");
	}
?>