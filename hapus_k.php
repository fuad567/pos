<?php

	include "koneksi.php";

	$id = $_GET['id'];

	$query = "DELETE FROM kategori_produk WHERE id_kategori='$id'";

	mysqli_query($db, $query);

	header('location:data_kategori.php');

?>
