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
    
    <title>Edit Data Produk - Digital Talent</title>
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
    <?php
	      $id_produk= $_GET['id'];
        if(!isset($id_produk)) {
          header('Location:data_produk.php');
        }

        include 'koneksi.php';

        $query = "SELECT * FROM produk WHERE id_produk='$id_produk'";

        $data = mysqli_query($db, $query);

        if (mysqli_num_rows($data) == 0) {
          header('location:data_produk.php');
        }
        
        $row = mysqli_fetch_array($data);
       // $kelamin = $row['jenis_kelamin'];

      ?>

    <div class="container" style="padding-bottom: 100px">
      <h2 style="text-align:center;padding-top:10px;padding-bottom: 10px"></h2>
	  <div style="padding-bottom:6px;padding-top:14px;margin-left:-15px;margin-right:-15px;background: linear-gradient(to right, #000099 0%, #7575a3 100%);color:white">
	  <h6 style="padding-left:15px;padding-right:15px;font-size:18px">Formulir Edit Data Produk</h6>
	  </div>
      <form class="form-group" action="edit_pr.php" method="post">
        <div class="row shadowb" style="padding-top:25px;padding-bottom: 35px;background-color:#7575a3;color:white">
          <div class="col-md-6" style="padding-left:25px;padding-right:25px">
            <input type="text" name="id" value="<?=$id_produk;?>" readonly hidden>
            <label>Nama Produk</label> <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Produk" value="<?php echo $row['nama_produk']; ?>" required><br />
            <label>Warna</label> <input type="text" name="warna" class="form-control" placeholder="Masukkan Warna" value="<?php echo $row['warna']; ?>" required><br />
            <label>Jumlah</label> <input type="text" name="jumlah" class="form-control" placeholder="Masukkan Jumlah" value="<?php echo $row['jumlah']; ?>" required><br />
            
          </div>
          <div class="col-md-6" style="padding-left:25px;padding-right:25px">
            <label>Harga</label> <input type="text" name="harga" class="form-control" placeholder="Masukkan Harga" value="<?php echo $row['harga']; ?>" required><br />
           
            <label>Merk</label> <br />
                                  <select class="form-control" name="id_merk">
					<?php
						include 'koneksi.php';
						$query = "SELECT * FROM merk";
						$data = mysqli_query($db, $query);
						if ($data === FALSE) {
							die(mysqli_error());
						}
						while ($hasil=mysqli_fetch_array($data)) { ?>
						<option value="<?php echo $hasil['id_merk']; ?>" <?php if($row['id_merk'] == $hasil['id_merk']) {echo 'selected';} ?>><?php echo $hasil['nama_merk']; ?></option>
					<?php } ?>
					</select><br />
           <label>Kategori</label>
           <select class="form-control" name="id_kategori">
					<?php
						$query = "SELECT * FROM kategori_produk";
						$data = mysqli_query($db, $query);
						if ($data === FALSE) {
							die(mysqli_error());
						}
						while ($hasil=mysqli_fetch_array($data)) { ?>
						<option value="<?php echo $hasil['id_kategori']; ?>" <?php if($row['id_kategori'] == $hasil['id_kategori']) {echo 'selected';} ?>><?php echo $hasil['nama_kategori']; ?></option>
					<?php } ?>
					</select>
          </div>
          <div class="col-md-12" style="padding-top:20px; padding-left:25px;padding-right:25px">
            
            <button type="submit" class="btn btn-primary shadowb">Simpan</button> &nbsp;<button type="reset" class="btn btn-danger shadowb">Reset</button> &nbsp;<a href="data_produk.php"><span class="btn btn-warning shadowb">Kembali</span></a>
          </div>
        </div>
      </form>
    </div>

    <!-- Footer -->
    <style>
      #sticky-footer {
        flex-shrink: none;
        /*position:fixed;*/
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
