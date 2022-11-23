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
                    <h6 class="mb-0"><?php echo $_SESSION['nama'];?></h6>
                        <span>User</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="tampil_barang.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                   
                        
                           
                        </div>
                        <div class="navbar-nav w-100">
                    <a href="laporanpemenang.php" class="nav-item nav-link active"><i class="fa fa-laptop me-2"></i>History</a>
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
                        <span class="d-none d-lg-inline-flex"><?=$_SESSION['nama']?></span>
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
            
            
            <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

</head>
<body>
   
<h2>Daftar Barang yang dilelang</h2>

<div class="row">
    
<?php 

include "koneksi.php";

$qry_barang=mysqli_query($koneksi,"select * from barang where status='dibuka'");

while($dt_barang=mysqli_fetch_array($qry_barang)){

    ?>

    <div class="col-md-3">

    <div class="card" >

    <img src="../Petugas/foto/<?=$dt_barang['foto_barang']?>" 
                    class="bd-placeholder-img card-img-top" width="270px" height="150px"
                    xmlns="http://www.w3.org/2000/svg" role="foto"
                    aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" 
                    focusable="false"><title></title>
                    <rect width="100%" height="100%" fill="#55595c"/></img>

          <div class="card-body">
          <div class="card-title d-flex justify-content-between mb-0">
            <h5 class="card-title text-dark"><?=$dt_barang['nama_barang']?></h5>
            <p class="card-text">$<?=substr($dt_barang['harga'], 0,20)?></p>
            </div>
          </div>
          <div class="rounded-bottom" style="background-color: #eee;">
            <div class="card-body">
            <p class="card-text"><?=substr($dt_barang['deskripsi'], 0,20)?></p> 
            <p class="card-text">Status :<?=substr($dt_barang['status'], 0,20)?></p>
          <center>  <a href="lihat_barang.php?id_barang=<?=$dt_barang['id_barang']?>" type="button" class="btn btn-sm btn-outline-secondary">Lihat</a></center>
              </div>
              </div>
           
         

        </div>

    </div>

    <?php

}

?>
</div>

</div>
   
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