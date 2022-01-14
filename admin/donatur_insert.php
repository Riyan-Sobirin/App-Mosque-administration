<?php
	include("sess_check.php");
	
	// query database memasukan data ke database
	if(isset($_POST['simpan'])) {
		$id_donatur = $_POST['id_donatur'];
		$nama_donatur = addslashes($_POST['nama_donatur']);
		$tpt_lahir = addslashes($_POST['tpt_lahir']);
		$tgl_lahir = $_POST['thn_lahir'] ."-". $_POST['bln_lahir'] ."-". $_POST['tgl_lahir'];
		$j_kelamin = $_POST['j_kelamin'];
		$alamat = addslashes($_POST['alamat']);
		$telepon = $_POST['telepon'];
		
		$sql = "INSERT INTO donatur (nama_donatur,tpt_lahir,tgl_lahir,j_kelamin,alamat,telepon)VALUES('$nama_donatur','$tpt_lahir','$tgl_lahir','$j_kelamin','$alamat','$telepon')";
		$ress = mysqli_query($conn, $sql);		
		
		header("location: donatur.php?act=add&msg=success");
	}
?>