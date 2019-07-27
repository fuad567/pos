<?php

	include "koneksi.php";

	$id_kategori = $_POST['id'];
	$nama_kategori = $_POST['nama'];

	$query = "UPDATE kategori_produk SET nama_kategori='$nama_kategori' WHERE id_kategori='$id_kategori'";

	mysqli_query($db, $query);

	header('location:data_kategori.php');
	//echo $id_pendaftar;	
?>
