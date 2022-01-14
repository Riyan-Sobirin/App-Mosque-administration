<?php
	include("sess_check.php");
	
	// query database memperbarui data pada database
	if(isset($_POST['perbarui'])) {
		$id_donatur = $_POST['id_donatur'];
		$nama_donatur = addslashes($_POST['nama_donatur']);
		$tpt_lahir = addslashes($_POST['tpt_lahir']);
		$tgl_lahir = $_POST['thn_lahir'] ."-". $_POST['bln_lahir'] ."-". $_POST['tgl_lahir'];
		$j_kelamin = $_POST['j_kelamin'];
		$alamat = addslashes($_POST['alamat']);
		$telepon = $_POST['telepon'];
		
		$sql = "UPDATE donatur SET
			nama_donatur='". $nama_donatur ."',
			tpt_lahir='". $tpt_lahir ."',
			tgl_lahir='". $tgl_lahir ."',
			j_kelamin='". $j_kelamin ."',
			alamat='". $alamat ."',
			telepon='". $telepon ."'
			WHERE id_donatur='". $id_donatur ."'";
		$ress = mysqli_query($conn, $sql);
		
		header("location: donatur.php?act=update&msg=success");
	}
?>