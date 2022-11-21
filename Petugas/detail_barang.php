<?php
    session_start();
    if ($_SESSION['status_login'] != true) {
        header('location:index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DarkPan - Bootstrap 5 Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                <h3 class="text-warning">   <img src="https://cdn-icons-png.flaticon.com/512/2599/2599899.png" alt="" style="width: 60px; height: 60px;">  </i>Lelang</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                    <img class="rounded-circle" src="../img/public.png" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?=$_SESSION['nama_petugas']?></h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="tampil_barang.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="tampil_barang" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Data</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="tampil_peserta.php" class="dropdown-item">Peserta</a>
                            <a href="tampil_petugas.php" class="dropdown-item">Petugas</a>
                           
                        </div>
                        <div class="navbar-nav w-100">
                    <a href="laporan.php" class="nav-item nav-link active"><i class="fa fa-laptop me-2"></i>History</a>
                    </div>
                    
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control bg-dark border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    
                                </div>
                            </a>
                           
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <img class="rounded-circle me-lg-2" src="../img/public.png" alt="" style="width: 40px; height: 40px;">
                        <span class="d-none d-lg-inline-flex"><?=$_SESSION['nama_petugas']?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="proses_logout.php" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav> <br>
            <!-- Navbar End -->


            <!-- Blank Start -->
           
            <?php
       
        include "koneksi.php";
        $query_barang = mysqli_query($koneksi, "SELECT * FROM barang where id_barang = '".$_GET['id_barang']."'");
        $data_barang = mysqli_fetch_array($query_barang);
        
        $query_pemenang = mysqli_query($koneksi, "SELECT * FROM peserta where id_peserta = '".$data_barang['id_pemenang']."'");
        $data_pemenang = mysqli_fetch_array($query_pemenang);

    ?>
    <div class="container col-md-12 py-5">
        <main class="container">     
            <div class="card">
                <div class="card mb-3" style="max-width: 100%;">
                    <div class="row g-0">
                        <div class="col-md-4">
                        <img src="../Petugas/foto/<?=$data_barang['foto_barang']?>" width="270px" height="150px" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <form action="proses_tutup_lelang.php" method="POST">
                                <input type="hidden" name="id_barang" value="<?=$data_barang['id_barang']?>">
                                <input type="hidden" name="id_pemenang" value="<?=$data_barang['id_pemenang']?>">
                                <table class="table table-striped">
                                    <h1 style="text-align:center">Detail Barang</h1>
                                    <thead>
                                        <?php if($data_barang['status'] == 'dibuka') :?>
                                        <tr>
                                            <td>Nama Barang</td>
                                            <td><?=$data_barang['nama_barang']?></td>
                                        </tr>
                                        <tr>
                                            <td>Status Lelang</td>
                                            <td><?=$data_barang['status']?></td>
                                        </tr>
                                        <tr>
                                            <td>Harga tertinggi saat ini</td>
                                            <td><?="Rp".number_format($data_barang['harga'])." ,"?></td>
                                        </tr>
                                        <tr>
                                            <?php if(isset($data_pemenang['nama'])):?>
                                            <td>Penawar Tertinggi</td>
                                            <td><?=$data_pemenang['nama']?></td>
                                            <?php endif; ?>
                                        </tr>
                                        <?php elseif($data_barang['status'] == 'ditutup') :?>
                                        <tr>
                                            <td>Nama Barang</td>
                                            <td><?=$data_barang['nama_barang']?></td>
                                        </tr>
                                        <tr>
                                            <td>Tahun</td>
                                            <td><?=$data_barang['tahun_barang']?></td>
                                        </tr>
                                        <tr>
                                            <td>Deskripsi</td>
                                            <td><?=$data_barang['deskripsi']?></td>
                                        </tr>
                                        <tr>
                                            <td>Status Lelang</td>
                                            <td><?=$data_barang['status']?></td>
                                        </tr>
                                        <tr>
                                            <td>Terlelang dgn Harga</td>
                                            <td><?="Rp".number_format($data_barang['harga'])." ,"?></td>
                                        </tr>
                                            <?php if(isset($data_pemenang['nama'])):?>
                                                <td>Penawar Tertinggi</td>
                                                <td><?=$data_pemenang['nama']?></td>
                                            <?php endif; ?>
                                        <?php else : ?>
                                        <tr>
                                            <td>Nama Mobil</td>
                                            <td><?=$data_barang['nama_barang']?></td>
                                        </tr>
                                        <tr>
                                            <td>Tahun</td>
                                            <td><?=$data_barang['tahun_barang']?></td>
                                        </tr>
                                        <tr>
                                            <td>Deskripsi</td>
                                            <td><?=$data_barang['deskripsi']?></td>
                                        </tr>
                                        <tr>
                                            <td>Status Lelang</td>
                                            <td><?=$data_barang['status']?></td>
                                        </tr>
                                        <?php endif; ?>
                                        <tr>
                                            <?php if($data_barang['status'] == 'dibuka') :?>
                                                <td> Status Lelang </td>
                                                <td>
                                                <!-- <a href="proses_tutup_lelang.php?id_barang=<?//=$data_barang['id_barang']?>" class="btn btn-danger"
                                                onclick="return confirm('Apakah anda yakin menghentikan lelang?')">Tutup</a> -->
                                                <input type="submit" name="tutup" value="Tutup" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghentikan lelang?')">    
                                            </td>
                                            <?php elseif($data_barang['status'] == 'belum dibuka') : ?>
                                                <td> Edit Status Lelang </td>
                                                <td>
                                                <a href="proses_mulai_lelang.php?id_barang=<?=$data_barang['id_barang']?>" class="btn btn-success"
                                                onclick="return confirm('Apakah anda yakin memulai lelang?')">Buka</a>
                                            <?php endif; ?>
                                                </td>
                                            </td>
                                        </tr>
                                    </thead>
                                </table>
                                </form>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="container col-md-12 py-5">
                <div class="card">
                    <div class="card-header">
                        <?php if($data_barang['status'] == 'dibuka') :?>
                            <h1 style="text-align:center">LIVE LELANG</h1>
                        <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr style="text-align:left">
                                    <th scope="col">NAMA PESERTA</th>
                                    <th scope="col">HARGA</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query_lelang=mysqli_query($koneksi, "
                                    SELECT * 
                                    FROM lelang
                                    JOIN peserta 
                                    where id_barang = '".$_GET['id_barang']."' and peserta.id_peserta = lelang.id_peserta
                                    ORDER BY harga DESC");

                                //$query_lelang=mysqli_query($koneksi,"SELECT * FROM lelang where id_barang = '".$_GET['id_barang']."' order by harga desc");

                                    while($data_lelang = mysqli_fetch_array($query_lelang)){
                                ?>
                                    <tr style="text-align:left">
                                        <td><?=$data_lelang['nama']?></td>
                                        <td><?="Rp".number_format($data_lelang['harga'])." ,"?></td>
                                    </tr>                
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        </div>
                        <?php else: ?>
                        <h1 style="text-align:center">RIWAYAT LELANG</h1>
                        <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr style="text-align:left">
                                    <th scope="col">NAMA PESERTA</th>
                                    <th scope="col">HARGA</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if ($data_barang['status'] == 'ditutup'){
                                    //$query_lelang=mysqli_query($koneksi,"SELECT * FROM lelang where id_barang = '".$_GET['id_barang']."'");


                                    $query_lelang=mysqli_query($koneksi, "
                                    SELECT lelang.id_barang, lelang.id_peserta, lelang.harga, peserta.nama 
                                    FROM lelang
                                    JOIN peserta ON peserta.id_peserta = lelang.id_peserta where id_barang = '".$_GET['id_barang']."'
                                    ORDER BY harga DESC");
                                    
                                    while($data_lelang = mysqli_fetch_array($query_lelang)){
                                ?>
                                    <tr style="text-align:left">
                                        <td><?=$data_lelang['nama']?></td>
                                        <td><?="Rp".number_format($data_lelang['harga'])." ,"?></td>
                                    </tr>                
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </main>
</body>
</html>
            <!-- Blank End -->


            <!-- Footer Start -->
            
            <!-- Footer End -->
        </div>
        <!-- Content End -->
        

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>