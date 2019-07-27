<?php

	include "koneksi.php";

	$id = $_GET['id'];

	$query = "DELETE FROM pelanggan WHERE id_pelanggan='$id'";

	mysqli_query($db, $query);

	header('location:data_pelanggan.php');

?>