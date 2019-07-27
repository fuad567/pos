<?php

	include "koneksi.php";

	$id_pelanggan = $_POST['id'];
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$kelamin = $_POST['kelamin'];
	$alamat = $_POST['alamat'];


	$query = "UPDATE pelanggan SET nama_pelanggan='$nama', jenis_kelamin='$kelamin', username='$username', password='$password', alamat='$alamat' WHERE id_pelanggan='$id_pelanggan'";


	mysqli_query($db, $query);

	header('location:data_pelanggan.php');
	//echo $id_pendaftar;	
?>