
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Detail Pertemuan</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">ABSENSI</a>
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
                        <h1 class="mt-4">Detail Pertemuan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Detail Pertemuan</li>
                        </ol>
                       
                    
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Detail Pertemuan
                            </div>
                            <div class="pull-right">
                </div>
                            <div class="card-body">
                                 <?php 
            $id = $_GET['id'];
        ?>

         <div class="container">
        <?php 
            $id = $_GET['id'];
            include("koneksi.php");
            $q = mysqli_query($koneksi, "SELECT * FROM kelas INNER JOIN pertemuan ON pertemuan.kelas_id=kelas.kelas_id WHERE pertemuan.pertemuan_id='$id'");
            $row = mysqli_fetch_array($q);
        ?>
        
       <h1 class="text-center">Detail Pertemuan</h1>
        <a href="lihat_detail_kelas.php?id=<?php echo $row['kelas_id']?>"  class="btn btn-primary">Back</a> 

         <br>
        Kode Kelas : <?=$row['kode_kelas'];?><br>
        Kode Matakuliah : <?=$row['kode_makul'];?><br>
        Nama Matakuliah : <?=$row['nama_makul'];?><br>
        Tahun : <?=$row['tahun'];?><br>
        Semester : <?=$row['semester'];?><br>
        SKS : <?=$row['sks'];?><br><br>
        Pertemuan Ke : <?=$row['pertemuan_ke'];?><br>
        Tanggal : <?=$row['tanggal'];?><br>
        Materi : <?=$row['materi'];?><br><br>

        <a href="import-excel.php?id=<?php echo $row['pertemuan_id']?>"  class="btn btn-primary">Import Excel</a> 
        <br><br>
        <table border="1" cellpadding="4">
        <tr bgcolor="DodgerBlue"> 
            <tr>
                <th>No</th>
                <th>Nama Mahasiswa</th>
                <th>Status Kehadiran</th>
                <th>Jam Masuk</th>
                <th>Jam Keluar</th>
                <th>Durasi Perkuliahan</th>
            </tr>
            <?php
                $query = mysqli_query($koneksi, 
                "SELECT * FROM mahasiswa
                LEFT OUTER JOIN krs_peserta_kelas as krs ON krs.mahasiswa_id=mahasiswa.mahasiswa_id
                LEFT OUTER JOIN kelas ON kelas.kelas_id=krs.kelas_id
                LEFT OUTER JOIN pertemuan ON pertemuan.kelas_id=kelas.kelas_id
                LEFT OUTER JOIN absensi ON absensi.pertemuan_id=pertemuan.pertemuan_id AND absensi.krs_id=krs.krs_id
                WHERE pertemuan.pertemuan_id='$id'
                ");
               
                $no = 1;
                while($r=mysqli_fetch_array($query)){
            ?>
            <tr>
                <td><?=$no++?></td>
                <td><?=$r['nama']?></td>
                <td><?php if($r['jam_masuk']==null) echo "Tidak Hadir"; else echo "Hadir";?></td>
                <td><?=$r['jam_masuk']?></td>
                <td><?=$r['jam_keluar']?></td>
                <td><?=$r['durasi']?></td>
            </tr>
            <?php } ?>
        </table>    
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



