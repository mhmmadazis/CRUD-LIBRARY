<?php
$jumlahdata = $db->rowCOUNT("SELECT f_nama, COUNT(*) AS kembali FROM t_anggota 
INNER JOIN t_peminjaman ON t_anggota.f_id=t_peminjaman.f_idanggota
INNER JOIN t_detailpeminjaman ON t_peminjaman.f_id=t_detailpeminjaman.f_idpeminjaman 
WHERE f_tanggalkembali ='0000-00-00' 
GROUP BY f_nama");
$banyak = 5;
$halaman = ceil($jumlahdata / $banyak);

if (isset($_GET['p'])) {
    $p = $_GET['p'];
    $mulai = ($p * $banyak) - $banyak;
} else {
    $mulai = 0;
}

$no = 1 + $mulai;

$limabuku = $db->getALL("SELECT f_judul, COUNT(*) AS dipinjam FROM t_peminjaman 
INNER JOIN t_detailpeminjaman ON t_peminjaman.f_id=t_detailpeminjaman.f_idpeminjaman 
INNER JOIN t_detailbuku ON t_detailpeminjaman.f_iddetailbuku=t_detailbuku.f_id 
INNER JOIN t_buku ON t_detailbuku.f_idbuku=t_buku.f_id 
WHERE NOT f_tanggalkembali = '0000-00-00'
GROUP BY f_judul ORDER BY COUNT(*) DESC LIMIT 5");

$limaanggota = $db->getALL("SELECT f_nama, COUNT(*) AS pinjam FROM t_anggota 
INNER JOIN t_peminjaman ON t_anggota.f_id=t_peminjaman.f_idanggota 
GROUP BY f_nama ORDER BY COUNT(*) DESC LIMIT 5
");

$bukupinjam = $db->rowCOUNT("SELECT f_judul FROM t_buku INNER JOIN t_detailbuku ON 
t_buku.f_id=t_detailbuku.f_idbuku WHERE f_status='Tidak Tersedia'");

$bukutersedia = $db->rowCOUNT("SELECT f_judul FROM t_buku INNER JOIN t_detailbuku ON 
t_buku.f_id=t_detailbuku.f_idbuku WHERE f_status='Tersedia'");

$anggota = $db->getALL("SELECT f_nama, COUNT(*) AS kembali FROM t_anggota 
INNER JOIN t_peminjaman ON t_anggota.f_id=t_peminjaman.f_idanggota
INNER JOIN t_detailpeminjaman ON t_peminjaman.f_id=t_detailpeminjaman.f_idpeminjaman 
WHERE f_tanggalkembali ='0000-00-00' 
GROUP BY f_nama ORDER BY COUNT(*) DESC LIMIT $mulai, $banyak
");

$angg = $db->rowCOUNT("SELECT f_nama, COUNT(*) AS kembali FROM t_anggota 
INNER JOIN t_peminjaman ON t_anggota.f_id=t_peminjaman.f_idanggota
INNER JOIN t_detailpeminjaman ON t_peminjaman.f_id=t_detailpeminjaman.f_idpeminjaman 
WHERE f_tanggalkembali ='0000-00-00' 
GROUP BY f_nama ORDER BY COUNT(*) DESC LIMIT 100
");
?>

<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arvo:ital@0;1&family=Reggae+One&family=Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <style type="text/css">
        body{
            font-family: 'Sriracha', cursive;
        }
    .warna {
        background-color: #f9e45b ;
    }

    .warna1 {
        background-color: #fbf0fc;
    }
    .plan-card {
      background: #fff;
      width: 15rem;
      padding-left: 2rem;
      padding-right: 2rem;
      padding-top: 10px;
      padding-bottom: 20px;
      border-radius: 10px;
      border-bottom: 4px solid #000446;
      box-shadow: 0 6px 30px rgba(207, 212, 222, 0.3);
      font-family: "Poppins", sans-serif;
    }

    .plan-card h2 {
      margin-bottom: 15px;
      font-size: 27px;
      font-weight: 600;
    }

    .plan-card h2 span {
      display: block;
      margin-top: -4px;
      color: #4d4d4d;
      font-size: 12px;
      font-weight: 400;
    }

    .etiquet-price {
      position: relative;
      background: #fdbd4a;
      width: 14.46rem;
      margin-left: -1.65rem;
      padding: .2rem 1.2rem;
      border-radius: 5px 5px 5px 5px;
    }

    .etiquet-price p {
      margin: 0;
      padding-top: .4rem;
      display: flex;
      font-size: 1.9rem;
      font-weight: 500;
    }

    .etiquet-price p:before {
      content: "";
      margin-right: 5px;
      font-size: 15px;
      font-weight: 300;
    }

    .etiquet-price p:after {
      content: "";
      margin-left: 5px;
      font-size: 15px;
      font-weight: 300;
    }

    .etiquet-price div {
      position: absolute;
      bottom: -23px;
      right: 0px;
      width: 0;
      height: 0;
      border-top: 13px solid #c58102;
      border-bottom: 10px solid transparent;
      border-right: 13px solid transparent;
      z-index: -6;
    }

    .benefits-list {
      margin-top: 16px;
    }

    .benefits-list ul {
      padding: 0;
      font-size: 14px;
    }

    .benefits-list ul li {
      color: #4d4d4d;
      list-style: none;
      margin-bottom: .2rem;
      display: flex;
      align-items: center;
      gap: .5rem;
    }

    .benefits-list ul li svg {
      width: .9rem;
      fill: currentColor;
    }

    .benefits-list ul li span {
      font-weight: 300;
    }

    .button-get-plan {
      display: flex;
      justify-content: center;
      margin-top: 1.2rem;
    }

    .button-get-plan a {
      display: flex;
      justify-content: center;
      align-items: center;
      background: #000446;
      color: #fff;
      padding: 10px 15px;
      border-radius: 5px;
      text-decoration: none;
      font-size: .8rem;
      letter-spacing: .05rem;
      font-weight: 500;
      transition: all 0.3s ease;
    }

    .button-get-plan a:hover {
      transform: translateY(-3%);
      box-shadow: 0 3px 10px rgba(207, 212, 222, 0.9);
    }

    .button-get-plan .svg-rocket {
      margin-right: 10px;
      width: .9rem;
      fill: currentColor;
    }
    .nav-link{color: #f9e45b}

    .pagination{
        justify-content: center;
    }
</style>

<div class="container">
    <h4 class="text-center mt-4" style="">Laporan Perpustakaan</h4>
    <hr class="mb-4">
    <div class="mt-4">
        <div style="display: flex; margin-left: auto; margin-right: auto; margin-bottom: 20px; justify-content: center;">
        <div class="plan-card">
            <center><img width="80px" src="../loginadmin/logo1.png"></center>
            <div class="etiquet-price">
                <p><h6>Jumlah Anggota Belum Mengembalikan</h6></p>
                <div></div>
            </div>
            <div class="benefits-list">
                <center><b style="font-size: 20px;"><?= $angg ?></b></center>
            </div>
            <div class="button-get-plan">
                <a href="../laporan/anggotabelumkembali.php">
                    <i class="bi bi-printer"></i>
                    <span>EXPORT</span>
                </a>
            </div>
        </div>

        <div class="plan-card" style="margin-left: 50px;">
            <center><img width="80px" src="../loginadmin/logo1.png"></center>
            <div class="etiquet-price">
                <p><h6>Jumlah Buku yang Belum Dikembalikan</h6></p>
                <div></div>
            </div>
            <div class="benefits-list">
                <center><b style="font-size: 20px;"><?= $bukupinjam ?></b></center>
            </div>
            <div class="button-get-plan">
                <a href="../laporan/exportbukupinjam.php">
                    <i class="bi bi-printer"></i>
                    <span>EXPORT</span>
                </a>
            </div>
        </div>
    </div>

    <br>
    <br>
    <div>
        <h5 style="color: #1b4d89;">Anggota yang Belum Mengembalikan</h5>    
    </div>

    <div style="display: none;"><p style="display: block;">sda</p></div>
    <table class="table table-bordered w-100">
        <tr class="warna">
            <th style="width: 20px;">No</th>
            <th>Banyak Anggota Yang Belum Mengembalikan</th>
            <th>Buku</th>
        </tr>

        <?php $no = 1; ?>

            <tbody class="warna1">
                <?php if (!empty($anggota)) { ?>
                    <?php foreach ($anggota as $r) { ?>
                        <tr>
                            <td style="background-color: #f9e45b;"><?= $no++ ?></td>
                            <td><?= $r['f_nama'] ?></td>
                            <td><?= $r['kembali'] ?></td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </tbody>
    </table>

    <div class="button-get-plan" style="margin-left: auto; margin-right: auto;">
        <a href="../laporan/anggotabelumkembali.php">
            <i class="bi bi-printer"></i>
            <span>EXPORT</span>
        </a>
    </div>


    <br>
    <br>
    <div>
        <h5 style="color: #1b4d89;">Buku Paling Banyak Dipinjam</h5>    
    </div>
    <table class="table table-bordered w-100">
        <tr class="warna">
            <th style="width: 20px;">No</th>
            <th>Judul Buku</th>
            <th style="width: 200px;">Jumlah yang dipinjam</th>
        </tr>

        <?php $no = 1; ?>

            <tbody class="warna1">
                <?php if (!empty($limabuku)) { ?>
                    <?php foreach ($limabuku as $buku) { ?>
                        <tr>
                            <td style="background-color: #f9e45b;"><?= $no++ ?></td>
                            <td><?= $buku['f_judul'] ?></td>
                            <td><?= $buku['dipinjam'] ?></td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </tbody>
    </table>

    <div class="button-get-plan" style="margin-left: auto; margin-right: auto;">
        <a href="../laporan/bukuseringpinjam.php">
            <i class="bi bi-printer"></i>
            <span>EXPORT</span>
        </a>
    </div>


    <br>
    <br>
    <div>
        <h5 style="color: #1b4d89;">Anggota Paling Sering Pinjam</h5>    
    </div>
    <table class="table table-bordered w-100" >
        <tr class="warna">
            <th style="width: 20px;">No</th>
            <th>Nama Anggota</th>
            <th style="width: 300px;">Jumlah Buku yang Pernah dipinjam</th>
        </tr>

        <?php $no = 1; ?>

            <tbody class="warna1">
                <?php if (!empty($limaanggota)) { ?>
                    <?php foreach ($limaanggota as $ang) { ?>
                        <tr>
                            <td style="background-color: #f9e45b;"><?= $no++ ?></td>
                            <td><?= $ang['f_nama'] ?></td>
                            <td><?= $ang['pinjam'] ?></td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </tbody>
    </table>

    <div class="button-get-plan" style="margin-left: auto; margin-right: auto;">
        <a href="../laporan/anggotaseringpinjam.php">
            <i class="bi bi-printer"></i>
            <span>EXPORT</span>
        </a>
    </div>  
    </div>
</div>