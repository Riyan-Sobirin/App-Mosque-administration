<?php
	include("sess_check.php");
	
	// query database memasukan/memperbarui data ke/pada database
	if(isset($_POST['rekap'])) {
		$tgl_rekap = $_POST['tgl_rekap'];
		$tgl_tampil = $_POST['tgl_tampil'];
		$infaq = $_POST['infaq'];
		$sodaqoh = $_POST['sodaqoh'];
		$pengeluaran = $_POST['pengeluaran'];
		$bln = $_POST['bln_rekap'];
		$thn = $_POST['thn_rekap'];
		
		$sql_chk = "SELECT * FROM rekap_kas WHERE tgl_rekap='". $tgl_rekap ."' AND tgl_tampil='". $tgl_tampil ."'";
		$ress_chk = mysqli_query($conn, $sql_chk);
		$rows = mysqli_num_rows($ress_chk);
		$sql = "";
		if($rows == 1) {
			$li = mysqli_fetch_array($ress_chk);
			$sql = "UPDATE rekap_kas SET
				tgl_rekap='". $tgl_rekap ."',
				tgl_tampil='". $tgl_tampil ."',
				infaq='". $infaq ."',
				sodaqoh='". $sodaqoh ."',
				pengeluaran='". $pengeluaran ."'
				WHERE no_rekap='". $li['no_rekap'] ."'";
			$ress = mysqli_query($conn, $sql);
		
			header("location: laporan_bulanan.php?bln=". $bln ."&thn=". $thn ."&act=rekap&msg=update_success");
		}
		else {
			$sql_rekap = "SELECT no_rekap FROM rekap_kas";
			$ress_rekap = mysqli_query($conn, $sql_rekap);
			$rows_rekap = mysqli_num_rows($ress_rekap);
			$newid_rekap = $rows_rekap + 1;
			
			$sql = "INSERT INTO rekap_kas VALUES (
				'". $newid_rekap ."',
				'". $tgl_rekap ."',
				'". $tgl_tampil ."',
				'". $infaq ."',
				'". $sodaqoh ."',
				'". $pengeluaran ."')";
			$ress = mysqli_query($conn, $sql);
		
			header("location: laporan_bulanan.php?bln=". $bln ."&thn=". $thn ."&act=rekap&msg=add_success");
		}
	}
?>