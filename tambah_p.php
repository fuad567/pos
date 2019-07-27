<?php

	include "koneksi.php";

	//$x = $_POST['id_pendaftar'];
	//$generate = mysqli_query($db, "SELECT id_pendaftar FROM pendaftaran ORDER BY id_pendaftar DESC");
	//$generate2 = mysqli_fetch_array($generate);
	
	//$x = $generate2['id_pendaftar'].+1;

	//$no_pendaftaran = 'MUGM00'.$x;
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$kelamin = $_POST['kelamin'];
	$alamat = $_POST['alamat'];

	$query = "INSERT INTO pelanggan SET nama_pelanggan='$nama', username='$username', password='$password', jenis_kelamin='$kelamin', alamat='$alamat'";
	mysqli_query($db, $query);
	
	header('location:data_pelanggan.php');

?>
