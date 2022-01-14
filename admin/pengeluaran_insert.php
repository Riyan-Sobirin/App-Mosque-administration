<?php
	include("sess_check.php");
	
	// query database memasukan data ke database
	if(isset($_POST['simpan'])) {
		$no_keluar = $_POST['no_keluar'];
		$jns_keluar = addslashes($_POST['jns_keluar']);
		$keluar_oleh = addslashes($_POST['keluar_oleh']);
		$tgl_keluar = $_POST['thn'] ."-". $_POST['bln'] ."-". $_POST['tgl'];
		$jumlah = $_POST['jumlah'];
		$keterangan = addslashes($_POST['keterangan']);
		
		$sql = "INSERT INTO pengeluaran (jns_keluar,keluar_oleh,tgl_keluar,jumlah,keterangan)VALUES('$jns_keluar','$keluar_oleh','$tgl_keluar','$jumlah','$keterangan')";

		$ress = mysqli_query($conn, $sql);		
		
		header("location: pengeluaran.php?act=add&msg=success");
	}
?>