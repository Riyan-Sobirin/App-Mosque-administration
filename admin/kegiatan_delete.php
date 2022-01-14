<?php
	include("sess_check.php");
	
	// query database menghapus data dari database
	if(isset($_POST['hapus'])) {
		$id = $_POST['id'];
		
		$sql = "DELETE FROM kegiatan WHERE keg_id='". $id ."'";
		$ress = mysqli_query($conn, $sql);
		
		header("location: kegiatan.php?act=delete&msg=success");
	}
?>