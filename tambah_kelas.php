
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tambah Kelas</title>
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
                        <h1 class="mt-4">Tambah Kelas</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Tambah Kelas</li>
                        </ol>
                       
                    
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Tambah Kelas
                            </div>
                            <div class="pull-right">
                </div>
                            <div class="card-body">
                               

        <div class="container" style="margin-top:20px">
        <h2>Tambah Kelas</h2>

         <form method="get" action="">
            <table >
            
                <tr>
                    <td>Kode Kelas</td>
                    <td>:</td>
                    <td>
                        <input type="text" name="kode_kelas" required>
                    </td>
                </tr>
                <tr>
                    <td>Kode Matkul</td>
                    <td>:</td>
                    <td>
                        <input type="text" name="kode_makul" required>
                    </td>
                </tr>
                <tr>
                    <td>Nama Matkul</td>
                    <td>:</td>
                    <td>
                        <input type="text" name="nama_makul" required>
                    </td>
                </tr>
                <tr>
                    <td>Tahun</td>
                    <td>:</td>
                    <td>
                        <input type="text" name="tahun" required>
                    </td>
                </tr>
                <tr>
                    <td>Semester</td>
                    <td>:</td>
                    <td>
                        <input type="radio" name="semester" value="1"> 1 (Ganjil) <br>
                        <input type="radio" name="semester" value="2"> 2 (Genap) <br>
                    </td>
                </tr>
                <tr>
                    <td>SKS</td>
                    <td>:</td>
                    <td>
                        <input type="text" name="sks" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <br>
                        <a href="lihat-kelas.php"><input type="button" name="submit" id="submit" value="KEMBALI" class="btn btn-primary"></a>
                    </td>
                    <td>
                        <br>
                        <input type="submit" name="submit" id="submit" value="SUBMIT" class="btn btn-primary">
                    </td>
                </tr>
            </table>
        </form>
        <?php
        error_reporting(0);
        include "koneksi.php";
        $kode_kelas = trim($_GET['kode_kelas']);
        $kode_makul = trim($_GET['kode_makul']);
        $nama_makul = trim($_GET['nama_makul']);
        $tahun = trim($_GET['tahun']);
        $semester = trim($_GET['semester']);
        $sks = trim($_GET['sks']);
        $kelas_id = trim($_GET['kelas_id']);

        if (isset($_GET['submit'])) {

            $querycek = mysqli_query($koneksi,"SELECT * FROM kelas WHERE kelas_id='$kelas_id'");

            if(mysqli_num_rows($querycek)==null){

                $query      = "INSERT INTO kelas VALUES('$kelas_id','$kode_kelas','$kode_makul','$nama_makul','$tahun','$semester','$sks')";
                
                $hasil      = mysqli_query($koneksi,$query) or die (mysqli_error($koneksi));

                if($hasil){
                    echo "<script>alert('BERHASIL MENAMBAH KELAS');window.location.replace('index.php');</script>";
                }else{
                    echo "<script>alert('GAGAL MENAMBAH KELAS');</script>";
                }
            }else{
                echo "<script>alert('KELAS TERDAFTAR');</script>";
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

      