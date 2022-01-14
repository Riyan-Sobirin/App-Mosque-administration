<?php
	include("sess_check.php");
	
	// query database memperbarui data pada database
	if(isset($_POST['perbarui'])) {
		$no_infaq = $_POST['no_infaq'];
		$jns_infaq = $_POST['jns_infaq'];
		$tgl_infaq = $_POST['thn'] ."-". $_POST['bln'] ."-". $_POST['tgl'];
		$terima_dari = addslashes($_POST['terima_dari']);
		$jumlah = $_POST['jumlah'];
		$keterangan = addslashes($_POST['keterangan']);
		
		$sql = "UPDATE infaq SET
			jns_infaq='". $jns_infaq ."',
			terima_dari='". $terima_dari ."',
			tgl_infaq='". $tgl_infaq ."',
			jumlah='". $jumlah ."',
			keterangan='". $keterangan ."'
			WHERE no_infaq='". $no_infaq ."'";
		$ress = mysqli_query($conn, $sql);
		
		header("location: infaq.php?act=update&msg=success");
	}
?>