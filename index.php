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

    <title>Point of Sales - Digital Talent</title>
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
            <li class="nav-item active" style="background-color:#00004d;color:white;padding-top:10px;margin-top:-10px;margin-bottom:-10px;padding-left:10px;padding-right:10px">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
           <li class="nav-item active" style="padding-left:10px;padding-right:10px">
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
            <input class="form-control mr-sm-0" style="border-radius:0rem;background-color:#f0f0f5" name="cari" type="search" placeholder="Cari Data Produk" aria-label="Search">
            <button class="btn form-control my-0 my-sm-0" style="border-radius:0rem;background-color:#e0e0eb;" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
          </form>
        </div>
      </nav>
    </div>

    <div class="container" style="padding-bottom: 100px">
      <h2 style="text-align:center;padding-top:10px;padding-bottom: 10px"></h2>
      <div style="padding-bottom:6px;padding-top:14px;margin-left:-15px;margin-right:-15px;background: linear-gradient(to right, #000099 0%, #7575a3 100%);color:white">
        <h6 style="padding-left:15px;padding-right:15px;font-size:18px">Point of Sales</h6>
      </div>
      
      <?php

        include 'koneksi.php';

        $bulanini = date('Y-m');
        $ttproduk = mysqli_query($db, "SELECT id_produk FROM produk");
        $totalproduk = mysqli_num_rows($ttproduk);
        $ttmerk = mysqli_query($db, "SELECT id_merk FROM merk");
        $totalmerk = mysqli_num_rows($ttmerk);
        $ttkategori = mysqli_query($db, "SELECT id_kategori FROM kategori_produk");
        $totalkategori = mysqli_num_rows($ttkategori);
        $ttpelanggan = mysqli_query($db, "SELECT id_pelanggan FROM pelanggan");
        $totalpelanggan = mysqli_num_rows($ttpelanggan);
        $tttransaksi = mysqli_query($db, "SELECT id_transaksi FROM transaksi");
        $totaltransaksi = mysqli_num_rows($tttransaksi);
        $ttomset = mysqli_query($db, "SELECT SUM(total_transaksi) FROM `transaksi` WHERE tanggal_transaksi LIKE '$bulanini-%'");
        $totalomset = mysqli_fetch_assoc($ttomset);
        $omset = $totalomset['SUM(total_transaksi)'];
        $limitst = mysqli_query($db, "SELECT nama_produk FROM produk WHERE jumlah <= 5");
        $limitstok = mysqli_fetch_assoc($limitst);
        $targetomset = 10000000;


      ?>

      <div class="row shadowb" style="padding-top:25px;padding-bottom: 0px;background-color:#7575a3;color:white">
          <div class="col-lg-2 col-md-4 col-sm-4" style="padding-bottom: 25px;">
              <div style="border:1px solid #c2c2d6;text-align:center;padding-bottom:15px" class="">
                    <span style="font-size:80px;color:#c2c2d6"><i class="fa fa-cubes" aria-hidden="true"></i></span><br><span style="color:#c2c2d6">Produk : <b><?php echo $totalproduk; ?></b></span>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4" style="padding-bottom: 25px;">
              <div style="border:1px solid #c2c2d6;text-align:center;padding-bottom:15px" class="">
                    <span style="font-size:80px;color:#c2c2d6"><i class="fa fa-apple" aria-hidden="true"></i></span><br><span style="color:#c2c2d6">Merk : <b><?php echo $totalmerk; ?></b></span>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4" style="padding-bottom: 25px;">
              <div style="border:1px solid #c2c2d6;text-align:center;padding-bottom:15px" class="">
                    <span style="font-size:80px;color:#c2c2d6"><i class="fa fa-list" aria-hidden="true"></i></span><br><span style="color:#c2c2d6">Kategori : <b><?php echo $totalkategori; ?></b></span>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4" style="padding-bottom: 25px;">
              <div style="border:1px solid #c2c2d6;text-align:center;padding-bottom:15px" class="">
                    <span style="font-size:80px;color:#c2c2d6"><i class="fa fa-user-circle" aria-hidden="true"></i></span><br><span style="color:#c2c2d6">Pelanggan : <b><?php echo $totalpelanggan; ?></b></span>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4" style="padding-bottom: 25px;">
              <div style="border:1px solid #c2c2d6;text-align:center;padding-bottom:15px" class="">
                    <span style="font-size:80px;color:#c2c2d6"><i class="fa fa-bar-chart" aria-hidden="true"></i></span><br><span style="color:#c2c2d6">Transaksi : <b><?php echo $totaltransaksi; ?></b></span>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4" style="padding-bottom: 25px;">
              <div style="border:1px solid #c2c2d6;text-align:center;padding-bottom:15px" class="">
                    <span style="font-size:80px;color:#c2c2d6"><i class="fa fa-money" aria-hidden="true"></i></span><br><span style="color:#c2c2d6">Rp <b><?php if (!$omset == 0) { echo $omset; } else { echo '0'; } ?></b></span>
                </div>
            </div>
            <div class="col-md-12" style="padding-bottom: 25px;">
              <div style="border:1px solid #c2c2d6;text-align:center;padding-bottom:0px" class="">
                <div class="alert alert-danger" style="background-color:inherit;color:inherit;text-align:left;font-size:14px;margin:20px">
                <h6><span class="fa fa-info-circle" aria-hidden="true"></span> &nbsp;Informasi Layanan</h6>
                <table>
                  <tbody>
                    <tr>
                      <td>Stok Limit </td>
                      <td>: &nbsp;<?php if (!mysqli_num_rows($limitst)) { echo 'Tidak ada'; } foreach ($limitst as $ls) { echo $ls['nama_produk'].'. '; } ?></td>
                    </tr>
                    <tr>
                        <td>Pencapaian Omset &nbsp; &nbsp; </td>
                        <td>: &nbsp;- Rp <?php echo $targetomset - $omset; ?> dari 10 juta</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            <div>
            <div class="row" style="padding-left:20px;padding-right:20px;margin-bottom:-10px;">
              <div class="col-md-2" style="padding-bottom: 10px">
                <a href="#">
                <span class="btn btn2" style="width:100%;background-color: inherit;border: 1px solid #c2c2d6;color:#c2c2d6"><i class="fa fa-gear" aria-hidden="true"></i> &nbsp;Konfigurasi</span></a>
              </div>
              <div class="col-md-2" style="padding-bottom: 10px">
                <a href="#">
                <span class="btn" style="width:100%;background-color: inherit;border: 1px solid #c2c2d6;color:#c2c2d6"><i class="fa fa-database" aria-hidden="true"></i> &nbsp;Backup DB</span></a>
              </div>
              <div class="col-md-2" style="padding-bottom: 10px">
                <a href="#">
                <span class="btn" style="width:100%;background-color: inherit;border: 1px solid #c2c2d6;color:#c2c2d6"><i class="fa fa-file-text" aria-hidden="true"></i> &nbsp;Buat Laporan</span></a>
              </div>
              <div class="col-md-2" style="padding-bottom: 10px">
                <a href="#">
                <span class="btn" style="width:100%;background-color: inherit;border: 1px solid #c2c2d6;color:#c2c2d6"><i class="fa fa-users" aria-hidden="true"></i> &nbsp;Data Supplier</span></a>
              </div>
              <div class="col-md-2" style="padding-bottom: 10px">
                <a href="#">
                <span class="btn" style="width:100%;background-color: inherit;border: 1px solid #c2c2d6;color:#c2c2d6"><i class="fa fa-credit-card-alt" aria-hidden="true"></i> &nbsp;Keuangan</span></a>
              </div>
              <div class="col-md-2" style="padding-bottom: 10px">
                <a href="#">
                <span class="btn" style="width:100%;background-color: inherit;border: 1px solid #c2c2d6;color:#c2c2d6"><i class="fa fa-power-off" aria-hidden="true"></i> &nbsp;Logout</span></a>
              </div>
            </div>
            </div>
                    <br>
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
        <span style=""><small>Copyright © Kelas RPL Pagi</small></span><span style="float:right"><small>Muhammad Fuad Fachrudin</span>
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
