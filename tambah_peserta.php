
<?php
    include "koneksi.php";
       
            $id =$_GET['id'];

?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tambah Pertemuan</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">ABSENSI</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                   
                </div>
            </form> 
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">ABSENSI</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Kelas
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="lihat-kelas.php">Lihat Kelas</a>
                                    <a class="nav-link" href="#">Mahasiswa</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                               
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                   
           
                                </nav>
                            </div>
                        
                        </div>
                    </div>
                   
                </nav>
            </div>
            <div id="layoutSidenav_content">

                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Tambah Peserta</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Tambah Peserta</li>
                        </ol>
                       
                    
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Tambah Peserta
                            </div>
                            <div class="pull-right">
                </div>
                            <div class="card-body">
                                 <?php 
            $id = $_GET['id'];
        ?>

        <div class="container" style="margin-top:20px">
        <h2>Tambah Pertemuan</h2>

        <?php
            $que = mysqli_query($koneksi, "SELECT * FROM mahasiswa where mahasiswa.mahasiswa_id not in (select mahasiswa_id from `krs_peserta_kelas` where kelas_id=$id)");
        ?>
        
      
    <form action="tambah_peserta.php" method="post">
                <input type="hidden" name="kelas_id" value="<?php echo $id ?>">
                <select name="mahasiswa_id" id="mahasiswa_id">
                    <option selected disabled>Pilih Nama Mahasiswa</option>
                    <?php
                        while($res  =mysqli_fetch_array($que)){
                            ?>
                            <option value="<?php echo $res['mahasiswa_id'] ?>">
                                <?php echo $res['nama'] ?>
                            </option>
                            <?php
                        }
                    ?>
                </select>
                <button type="submit"  class="btn btn-primary">Tambah</button>
            </form>

<?php
    include 'koneksi.php';
            if(isset($_POST['mahasiswa_id'])) {
                $kelas_id = $_POST['kelas_id'];
                $mahasiswa_id = $_POST['mahasiswa_id'];
                
                $add = mysqli_query($koneksi,"INSERT INTO `krs_peserta_kelas`(kelas_id,mahasiswa_id) VALUES ('$kelas_id','$mahasiswa_id')");
                
                if ($add) {
                    echo "<script> alert ('Peserta berhasil ditambahkan') ; document.location.href='lihat_detail_kelas.php?id=$kelas_id'; </script>";
                }
                else {
                    echo "<script> alert ('Peserta gagal ditambahkan') ; document.location.href='lihat_detail_kelas.php?id=$kelas_id';</script>"; 
                }
            }
                
            ?>

        </div>


                            </div>
                        </div>
                    </div>
                </main>
                
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>


