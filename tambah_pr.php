<?php

	include "koneksi.php";

	//$x = $_POST['id_pendaftar'];
	//$generate = mysqli_query($db, "SELECT id_pendaftar FROM pendaftaran ORDER BY id_pendaftar DESC");
	//$generate2 = mysqli_fetch_array($generate);
	
	//$x = $generate2['id_pendaftar'].+1;

	//$no_pendaftaran = 'MUGM00'.$x;

	$nama_produk = $_POST['nama'];
	$warna      = $_POST['warna'];
	$jumlah		= $_POST['jumlah'];
	$harga		= $_POST['harga'];
	$id_merk		= $_POST['id_merk'];
	$id_kategori		= $_POST['id_kategori'];

// query SQL untuk insert data
	$query = "INSERT INTO produk SET nama_produk='$nama_produk', warna='$warna', jumlah='$jumlah', harga='$harga', id_merk='$id_merk', id_kategori='$id_kategori'";
	
	//$query="INSERT INTO produk values(NULL,'$nama_produk','$warna','$jumlah','$harga','$id_merk','$id_kategori')";
	mysqli_query($db, $query);
	//print_r($query);
	header('location:data_produk.php');

?>
