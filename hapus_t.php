<?php
include 'koneksi.php';

// menyimpan data kedalam variabel
$id_transaksi = $_GET['id'];

// ambil data dari transaksi
$query1 = "SELECT * FROM transaksi t LEFT JOIN produk p ON t.id_produk = p.id_produk WHERE id_transaksi = $id_transaksi";
$data = mysqli_query($db, $query1);
$row = mysqli_fetch_assoc($data);
$id_produk = $row['id_produk'];
$total_transaksi = $row['total_transaksi'];
$jumlah = $row['jumlah']; 
$harga = $row['harga'];

$hasil = ($total_transaksi / $harga) + $jumlah;

// query SQL untuk insert data
$query2 = "DELETE FROM transaksi WHERE id_transaksi = '$id_transaksi'";
mysqli_query($db, $query2);

// mengembalikan jumlah stok semula
$query3 = "UPDATE produk SET jumlah = $hasil WHERE id_produk = $id_produk";
mysqli_query($db, $query3);
//print_r($query3);
header("location:data_transaksi.php");
?>