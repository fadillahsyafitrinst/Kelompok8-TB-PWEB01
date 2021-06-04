
<?php
    include "koneksi.php";
       
            $id =$_GET['id'];
    
        $query = mysqli_query($koneksi, "SELECT * FROM kelas WHERE kelas_id ='$id'");
        $result = mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>ABSENSI - PERKULIAHAN</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">SISTEM INFORMASI ABSENSI</a>
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
                            <a class="nav-link" href="index.html">
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
                        <h1 class="mt-4">Data Detail Kelas</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Detail Kelas</li>
                        </ol>
                       
                    
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               Lihat Detail Kelas
                            </div>
                            <div class="pull-right">
                           
                </div>
                            <div class="card-body">

                               <table border="0" cellpadding="4">
        <tr>
            <td size="90">Kode Kelas</td>
            <td>: <?php echo $result['kode_kelas']?></td>
        </tr>
        <tr>
            <td>Kode makul</td>
            <td>: <?php echo $result['kode_makul']?></td>
        </tr>
        <tr>
            <td>Nama makul</td>
            <td>: <?php echo $result['nama_makul']?></td>
        </tr>
        <tr>
            <td>Tahun</td>
            <td>: <?php echo $result['tahun']?></td>
        </tr>
        <tr>
            <td>Semester</td>
            <td>: <?php echo $result['semester']?></td>
        </tr>
        <tr>
            <td>SKS</td>
            <td>: <?php echo $result['sks']?></td>
        </tr>
        </table>

        <br>
        <tr>
            <td><h5>Data Mahasiswa</h5></td>
            <br>        
        </tr>

         <a href="tambah_peserta.php?id=<?=$id?>" class="btn btn-primary"> Tambah Peserta </a> 

        <br><br>
        <table border="1" cellpadding="4">
        <tr bgcolor="DodgerBlue">
            <th>No.</th>
            <th>Nama</th>
            <th>OPSI</th>
        </tr>

        <?php
         
        $no=0;
        $query2 = mysqli_query($koneksi, "SELECT * FROM `krs_peserta_kelas` join mahasiswa on mahasiswa.mahasiswa_id = krs_peserta_kelas.mahasiswa_id where kelas_id=$id");
        while($result2  =mysqli_fetch_array($query2)){
        $no++;

        ?>

        <tr>
            <td><?php echo $no?></td>
            <td><?php echo $result2['nama']?></td>
            <td><a href="hapus_peserta.php?krs_id=<?php echo $result2['krs_id']?>&&kelas_id=<?php echo $id?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a></td>
        </tr>
        <?php
        }
        ?>

        <table>
        <tr>
            <td><h5>Data Pertemuan<h5></td>
            <br>

            <a href="tambah-pertemuan.php?id=<?=$id?>" class="btn btn-primary"> Tambah Pertemuan </a>

        </tr>
        <table border="1" cellpadding="4">
        <tr bgcolor="DodgerBlue"> 
            <th>No.</th>
            <th>Kelas</th>
            <th>Pertemuan Ke</th>
            <th>Tanggal</th>
            <th>Materi</th>
            <th> Aksi </th>

         </tr>

         <?php
            
            $no=0;
            $sql = mysqli_query($koneksi,"SELECT * FROM pertemuan INNER JOIN kelas ON pertemuan.kelas_id=kelas.kelas_id WHERE pertemuan.kelas_id='$id'");
            while ($value = mysqli_fetch_array($sql)) {
            $no++;
            ?>

            <tr>
                <td><?php echo $no?></td>
                <td><?php echo $value['nama_makul']?></td>
                <td><?php echo $value['pertemuan_ke']?></td>
                <td><?php echo $value['tanggal']?></td>
                <td><?php echo $value['materi']?></td>
                <td><a href="detail-pertemuan.php?id=<?php echo $value['pertemuan_id']?> " class="btn btn-primary">Detail Pertemuan</a></td>
            </tr>
            <?php
            }
         ?>
         </table>
    </table>
    <br>


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
