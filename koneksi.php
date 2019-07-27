<?php

// Koneksi ini harus disimpan kalau kita mau menampilkan atau mengupdate data harus pakai koneksi ini dulu
$server = "localhost";
$user = "root";
$password = "";
$nama_database = "kelompok3";

$db = mysqli_connect($server, $user, $password, $nama_database);

if( !$db ) {
	die ("Gagal terhubung dengan database : ". mysqli_connect_error());
}

?>
