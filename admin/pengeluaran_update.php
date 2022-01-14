<?php
	include("sess_check.php");
	
	// query database memperbarui data pada database
	if(isset($_POST['perbarui'])) {
		$no_keluar = $_POST['no_keluar'];
		$jns_keluar = addslashes($_POST['jns_keluar']);
		$keluar_oleh = addslashes($_POST['keluar_oleh']);
		$tgl_keluar = $_POST['thn'] ."-". $_POST['bln'] ."-". $_POST['tgl'];
		$jumlah = $_POST['jumlah'];
		$keterangan = addslashes($_POST['keterangan']);
		
		$sql = "UPDATE pengeluaran SET
			jns_keluar='". $jns_keluar ."',
			keluar_oleh='". $keluar_oleh ."',
			tgl_keluar='". $tgl_keluar ."',
			jumlah='". $jumlah ."',
			keterangan='". $keterangan ."'
			WHERE no_keluar='". $no_keluar ."'";
		$ress = mysqli_query($conn, $sql);		
		
		header("location: pengeluaran.php?act=update&msg=success");
	}
?>