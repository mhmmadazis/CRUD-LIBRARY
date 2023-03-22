<?php

require_once "../dbcontroller.php";
$db = new dbcontroller;

session_start();
if (!isset($_SESSION['admin'])) {
    header("location:index.php");
}

if (isset($_GET['log'])) {
    session_destroy();

    header("location:../index.php");
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SPENSBAYA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <!-- <link rel="stylesheet" href="dist/css/adminlte.min.css"> -->
    <link rel="stylesheet" href="../css/style.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <style type="text/css">
        aside{
            border-bottom-right-radius: 20px;
            border-top-right-radius: 20px;
        }
        .nav-item a:hover {
            background-color: red;
            color: white;
        }
        .nav-log a:hover {
            background-color: red;
            color: white;
        }
        .nav-link:hover{
            color: white;
        }  
        .nav-sidebar .nav-item>.nav-link {
    position: relative;
    color: white;
}
    </style>
</head>
<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="margin-left: 250px;">
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto" style="margin-left: auto;">
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link active" href="?log=logout" style="font-size: 20px;">Logout <i class="bi bi-box-arrow-right mx-2"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <aside style="height:100px; position: fixed; background-color: #1b4d89;" class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index.php" class="brand-link">
                <span class="brand-text font-weight-light"><center><img src="logo1.png" style="width: 150px;"></center></span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar" style="position: fixed;">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-1 pb-3 mb-1 d-flex">
                    <div class="info d-flex align-items-center">
                        <i class="fa-regular fa-user" style="color:#f9e45b; margin-left: 10px;"></i>
                        <p href="#" class="d-block" style="margin-left: 10px;font-family: 'Reggae One', cursive; text-transform: capitalize; color:#f9e45b; margin-top: 15px;"><?php echo $_SESSION['admin'] ?></p>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false"><?php
                    $level = $_SESSION['level'];
                    switch ($level) {
                        case 'Admin':
                            echo '
                    <li class="nav-item"><a class="nav-link" href="?f=kategori&m=select"><i class="nav-icon bi bi-list-task mx-2"></i>Kategori</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="?f=buku&m=select"><i class="bi bi-journal-bookmark-fill mx-2"></i>Buku</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="?f=admin&m=select"><i class="bi bi-fingerprint mx-2"></i>Admin</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="?f=anggota&m=select"><i class="bi bi-people-fill mx-2"></i>Anggota</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="?f=peminjaman&m=select"><i class="bi bi-folder-plus mx-2"></i>Peminjaman</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="?f=pengembalian&m=select"><i class="bi bi-folder-minus mx-2"></i></i>Pengembalian</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="?f=laporan&m=select"><i class="bi bi-folder2-open mx-2"></i>Laporan Pengembalian</a>
                    </li>
                    ';
                            break;
                        case 'Pustakawan':
                            echo '
                            <li class="nav-item"><a class="nav-link" href="?f=peminjaman&m=select"><i class="bi bi-folder-plus mx-2"></i>Peminjaman</a></li>
                            
                            <li class="nav-item"><a class="nav-link" href="?f=pengembalian&m=select"><i class="bi bi-folder-minus mx-2"></i></i>Pengembalian</a></li>
                            
                            <li class="nav-item"><a class="nav-link" href="?f=laporan&m=select"><i class="bi bi-folder2-open mx-2"></i>Laporan Pengembalian</a></li>
                            
                            ';
                            break;
                    }
                    ?>
                      </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                  </div>
                  <!-- /.sidebar -->
                </aside>

                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper" style="margin-left: 250px;">
                  <!-- Content Header (Page header) -->
                  <section class="content-header">
                    <div class="container-fluid">
                      <div class="row mb-2">
                        <div class="col-sm-6">
                          <?php
                            $level = $_SESSION['level'];
                                switch ($level) {
                                    case 'Admin':
                                        echo '<h1>Admin</h1>';
                                    break;
                                    case 'Pustakawan':
                                        echo '<h1>Pustakawan</h1>';
                                    break;
                                }
                        ?>
                        </div>
                      </div>
                    </div>
                    <!-- /.container-fluid -->
                  </section>

                  <!-- Main content -->
                  <section class="content">
                    <!-- Default box -->
                    <div class="card">
                      <div class="card-header" style="background-color: #f9e45b;">
                        <h3 class="card-title" style="margin-top: 10px;">SPENSBAYA LIBRARY</h3>
                      </div>
                      <div class="card-body">
                        <?php
                if (isset($_GET['f']) && isset($_GET['m'])) {
                    switch ($level) {
                        case 'Admin':
                            $f = $_GET['f'];
                            $m = $_GET['m'];

                            $file = '../' . $f . '/' . $m . '.php';

                            include $file;
                            break;
                        case 'Pustakawan':
                            if ($_GET['f'] == 'anggota' or $_GET['f'] == 'peminjaman' or $_GET['f'] == 'pengembalian' or $_GET['f'] == 'laporan') {
                                $f = $_GET['f'];
                                $m = $_GET['m'];

                                $file = '../' . $f . '/' . $m . '.php';

                                include $file;
                            } else {
                                echo '<center> Anda Tidak Memiliki Hak Akses Halaman Ini </center>';
                            }

                            break;
                        default:
                            echo '<center> Anda Tidak Memiliki Hak Akses Halaman Ini </center>';
                            break;
                    }
                } else {
                    require_once "../peminjaman/select.php";
                }
                ?>
                      </div>
                      <!-- /.card-body -->
                      <!-- /.card-footer-->
                    </div>
                    <!-- /.card -->
                  </section>
                  <!-- /.content -->
                </div>
                <!-- /.content-wrapper -->

                <footer class="main-footer">
                  <b>Muhammad Azis 2023</b> All rights reserved.
                </footer>

                <!-- Control Sidebar -->
                <aside class="control-sidebar control-sidebar-dark">
                  <!-- Control sidebar content goes here -->
                </aside>
                <!-- /.control-sidebar -->

                <!-- /.control-sidebar -->
                </div>
</body>
</html>