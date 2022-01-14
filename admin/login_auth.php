<?php
// memulai session
session_start();
// memanggil file koneksi
include("dist/config/koneksi.php");

// mengecek apakah tombol login sudah di tekan atau belum
if(isset($_POST['login'])) {
	// mengecek apakah username dan password sudah di isi atau belum
	if(empty($_POST['username']) || empty($_POST['password'])) {
		// mengarahkan ke halaman login.php
		header("location: login.php?err=empty");
	}
	else {
		// membaca nilai variabel username dan password
		$username = $_POST['username'];
		$password = $_POST['password'];
		// mencegah sql injection
		$username = htmlentities(trim(strip_tags($username)));
		$password = htmlentities(trim(strip_tags($password)));
		// memeriksa username di tabel admin
		$sql = "SELECT * FROM pengguna WHERE username='". $username ."' AND password='". $password ."'";
		$ress = mysqli_query($conn, $sql);
		$rows = mysqli_num_rows($ress);
		// mendaftarkan session jika username di temukan
		if($rows == 1) {
			$data = mysqli_fetch_array($ress);
			// membuat variabel session
			$_SESSION['user_keuangandkm'] = strtolower($data['id_pengguna']);
			// mengarahkan ke halaman indeks.php
			header("location: index.php?login=success");
		}
		else {
			header("location: login.php?err=not_found");
		}
	}
}
?>