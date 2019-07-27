<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="icon/css/font-awesome.min.css">
    <link rel="icon" type="image/x-icon" href="https://digitalent.kominfo.go.id/favicon.ico"/>

    <title>Data Produk - Digital Talent</title>
  </head>
  <body style="background-color:#c2c2d6">
    <div class="container-fluid shadowb" style="padding:0px">
      <nav class="navbar navbar-expand-lg navbar-dark" style="background: linear-gradient(to right, #000099 0%, #7575a3 100%)!important">
        <a class="navbar-brand" href="index.php"><img src="images/logo2.png" height="35px" /></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active" style="padding-left:10px;padding-right:10px">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
           <li class="nav-item active" style="background-color:#00004d;color:white;padding-top:10px;margin-top:-10px;margin-bottom:-10px;padding-left:10px;padding-right:10px">
              <a class="nav-link" href="data_produk.php">Data Produk</a>
            </li>
            <li class="nav-item active" style="padding-left:10px;padding-right:10px">
              <a class="nav-link" href="data_kategori.php">Data Kategori</a>
            </li>
            <li class="nav-item active" style="padding-left:10px;padding-right:10px">
              <a class="nav-link" href="data_merk.php">Data Merk</a>
            </li>
            <li class="nav-item active" style="padding-left:10px;padding-right:10px">
              <a class="nav-link" href="data_pelanggan.php">Data Pelanggan</a>
            </li>
            <li class="nav-item active" style="padding-left:10px;padding-right:10px">
              <a class="nav-link" href="data_transaksi.php">Data Transaksi</a>
            </li>
            
          </ul>
          <form class="form-inline my-0 my-lg-0" action="data_produk.php" method="get">
            <input class="form-control mr-sm-0" style="border-radius:0rem;background-color:#f0f0f5" name="cari" type="search" placeholder="Cari Produk" aria-label="Search">
            <button class="btn form-control my-0 my-sm-0" style="border-radius:0rem;background-color:#e0e0eb;" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
          </form>
        </div>
      </nav>
    </div>

    <div class="container" style="padding-bottom: 100px">
      <h2 style="text-align:center;padding-top:10px;padding-bottom: 10px"></h2>
      <div style="padding-bottom:10px;padding-top:10px;margin-left:-15px;margin-right:-15px;background: linear-gradient(to right, #000099 0%, #7575a3 100%);color:white">
	  <span style="padding-left:15px;padding-right:15px;padding-top:-5px;font-weight:600;font-size:18px">Data Produk <span style="float:right"><a href="tambah_produk.php"><span class="btn btn-default btn-sm shadowb" style="border:1px solid white;background-color:#000080;color:white;margin-top:-1px;margin-right:10px">Tambah Produk</span></a></span></span>
	  </div>
      
      <div class="row shadowb" style="padding-top:25px;padding-bottom: 10px;background-color:#7575a3;color:white">
          <div class="col-md-12" style="padding-top:0px; padding-left:25px;padding-right:25px">
            <table class="table" style="color:white">
			  <thead>
				<tr style="text-align:left">
				  <th scope="col">No</th>
				  <th scope="col">ID</th>
				  <th scope="col">Nama Produk</th>
				  <th scope="col">Warna</th>
				  <th scope="col">Jumlah</th>
				  <th scope="col">Harga</th>
				  <th scope="col">Merk</th>
				  <th scope="col">Kategori</th>
				  <th scope="col">Aksi</th>
				</tr>
			  </thead>
			  <tbody>
				  <?php
					include 'koneksi.php';

					if(!isset($_GET['cari'])) {
					  $mahasiswa = mysqli_query($db,"SELECT * FROM produk INNER JOIN merk ON produk.id_MERK=merk.id_merk INNER JOIN kategori_produk on produk.id_kategori=kategori_produk.id_kategori");
					  //punya miel $mahasiswa = mysqli_query($db,"select * from produk p inner join kategori_produk kp on p.id_produk = kp.id_kategori inner join merk m on p.id_produk = m.id_merk");
					}
					else {
					  $keyword = $_GET['cari'];
					  $mahasiswa = mysqli_query($db, "SELECT * FROM produk p inner join kategori_produk kp on p.id_produk = kp.id_kategori inner join merk m on p.id_produk = m.id_merk WHERE id_produk LIKE '%$keyword%' OR nama_produk LIKE '%$keyword%' OR warna LIKE '%$keyword%' OR jumlah LIKE '%$keyword%' OR harga LIKE '%$keyword%' OR nama_merk LIKE '%$keyword%' OR nama_kategori LIKE '%$keyword%'");
					}

					$no = 1;

					foreach ($mahasiswa as $row) {
					//$jenis_kelamin = $row['jenis_kelamin']=='P'?'Perempuan':'Laki laki';
					echo "
				<tr>
				  <th scope='row'>".$no."</th>
				  <td>".$row['id_produk']."</td>
				  <td>".$row['nama_produk']."</td>
				  <td>".$row['warna']."</td>
				  <td>";if(!$row['jumlah'] == 0) { echo $row['jumlah']; } else { echo 'kosong'; } echo "</td>
				  <td>".$row['harga']."</td>
				  <td>".$row['nama_merk']."</td>
				  <td>".$row['nama_kategori']."</td>
				  <td><a href='hapus_pr.php?id=".$row['id_produk']."'><i class='fa fa-trash' style='color:white;' aria-hidden='true'></i></a> &nbsp;
							<a href='edit_produk.php?id=".$row['id_produk']."'><i class='fa fa-pencil' style='color:white' aria-hidden='true'></i></a></td>
				</tr>";
				$no++;
			} ?>
			  </tbody>
			</table>

			<div style="padding-top:10px;padding-bottom:10px">
				<span style="color:white"><?php
        
        if(mysqli_num_rows($mahasiswa) <= 0) {
          echo '<p style="text-align:center">Data tidak ditemukan</p>';
        }
        else {
			echo 'Total Produk : <b>'. mysqli_num_rows($mahasiswa).'</b>';
		}
      ?></span>
			</div>
        </div>
      </div>
      
    </div>

    <style>
      #sticky-footer {
        flex-shrink: none;
        position:fixed;
        bottom:0;
        left:0;
        width:100%;
        text-align:center;
    }
    #sticky-footer2 {
        flex-shrink: none;
        position:fixed;
        bottom:0;
        right:0;
        text-align:left;
        margin-right: 20px;
        margin-bottom: 60px;
    }
    td a {
      color:#003979;
    }
    .shadowb {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .circle {
  display: block;
  width: 50px;
  height: 50px;
  margin: 1em auto;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center center;
  -webkit-border-radius: 99em;
  -moz-border-radius: 99em;
  border-radius: 99em;
  border: 0px solid #eee;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

    </style>

    <a href="https://api.whatsapp.com/send?phone=6285640828636" target="_blank" title="Chat via Whatsapp">
      <img class="circle" src="images/wa.png" id="sticky-footer2" width="45px">
    </a>
    <!-- Footer -->
    <footer id="sticky-footer" class="py-2 text-white-50" style="background-color: #000033;">
      <div class="container" style="text-align:left">
        <span style=""><small>Copyright © Kelas RPL Pagi</small></span><span style="float:right"><small>Muhammad Fuad Fachrudin</small></span>
      </div>
    </footer>
    <!-- Footer -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </body>
</html>
