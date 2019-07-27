<?php

	include "koneksi.php";

	//$x = $_POST['id_pendaftar'];
	//$generate = mysqli_query($db, "SELECT id_pendaftar FROM pendaftaran ORDER BY id_pendaftar DESC");
	//$generate2 = mysqli_fetch_array($generate);
	
	//$x = $generate2['id_pendaftar'].+1;

	//$no_pendaftaran = 'MUGM00'.$x;
	$nama_merk = $_POST['nama'];

	$query = "INSERT INTO merk SET nama_merk='$nama_merk'";
	mysqli_query($db, $query);
	
	header('location:data_merk.php');

?>
