<?php

	include "koneksi.php";

	$id_merk = $_POST['id'];
	$nama_merk = $_POST['nama'];

	$query = "UPDATE merk SET nama_merk='$nama_merk' WHERE id_merk='$id_merk'";


	mysqli_query($db, $query);

	header('location:data_merk.php');
	//echo $id_pendaftar;	
?>