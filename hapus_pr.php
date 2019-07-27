<?php

	include "koneksi.php";

	$id = $_GET['id'];

	$query = "DELETE FROM produk WHERE id_produk='$id'";

	mysqli_query($db, $query);

	header('location:data_produk.php');

?>
