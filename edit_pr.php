<?php

	include "koneksi.php";

	$id_produk = $_POST['id'];
	$nama = $_POST['nama'];
	$warna = $_POST['warna'];
	$jumlah	= $_POST['jumlah'];
	$harga = $_POST['harga'];
	$id_merk = $_POST['id_merk'];
	$id_kategori = $_POST['id_kategori'];

	$query = "UPDATE produk SET nama_produk='$nama', warna='$warna', jumlah='$jumlah', harga='$harga', id_merk='$id_merk', id_kategori='$id_kategori' WHERE id_produk='$id_produk'";

	mysqli_query($db, $query);
	//print_r($query);
	header('location:data_produk.php');

?>
