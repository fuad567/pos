<?php

	include "koneksi.php";

	$id = $_GET['id'];

	$query = "DELETE FROM merk WHERE id_merk='$id'";

	mysqli_query($db, $query);

	header('location:data_merk.php');

?>