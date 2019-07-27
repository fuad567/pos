<?php
include 'koneksi.php';

// menyimpan data kedalam variabel
$id_pelanggan = $_POST['id_pelanggan'];
$id_produk = $_POST['id_produk'];
$jumlah = $_POST['jumlah'];
$tanggal_transaksi = $_POST['tanggal_transaksi'];

// Proses stok
$cekharga = "SELECT * FROM produk WHERE id_produk = $id_produk";
$prosesharga = mysqli_query($db, $cekharga);
$row = mysqli_fetch_assoc($prosesharga);
$harga = $row['harga'];

$total_transaksi = $harga * $jumlah;

// mengurangi stok produk
$laststok = $row['jumlah'];
$updatestok = $laststok - $jumlah;

// validasi saat nama pengguna tidak sesuai / belum diisi
if ($id_pelanggan == 'noname') { 
		echo "<script>alert('Gagal, silahkan periksa kembali formulir transaksi!');";
		echo "window.location.href = 'tambah_transaksi.php';</script>;";
	}

// Query SQL untuk insert data
if ($updatestok >= 0 && $id_pelanggan != 'noname') {
	
	$query="INSERT INTO transaksi (`tanggal_transaksi`, `total_transaksi`, `id_pelanggan`, `id_produk`) values ('$tanggal_transaksi','$total_transaksi', $id_pelanggan, $id_produk)";
	//print_r($query);

	mysqli_query($db, $query);

	// Proses update / pengurangan jumlah Stok
	$query2 = "UPDATE produk SET jumlah = '$updatestok' WHERE id_produk = $id_produk";
	mysqli_query($db, $query2);
	//print_r($query2);
	header("location:data_transaksi.php");
	}

else {
	echo "<script>alert('Maaf stok habis, proses transaksi dibatalkan!');";
	echo "window.location.href = 'tambah_transaksi.php';</script>";
}

?>