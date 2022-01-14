<?php
	include("sess_check.php");
	
	// query database memasukan data ke database
	if(isset($_POST['simpan'])) {
		$nama = addslashes($_POST['nama']);
		$tgl = addslashes($_POST['tgl']);
		$keterangan = addslashes($_POST['keterangan']);
		
		$sql = "INSERT INTO kegiatan (keg_nama, keg_tgl, keg_ket) VALUES ('$nama','$tgl','$keterangan')";
		$ress = mysqli_query($conn, $sql);		
		
		header("location: kegiatan.php?act=add&msg=success");
	}
?>