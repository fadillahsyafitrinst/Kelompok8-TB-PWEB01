
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Import File Excel</title>
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
                        <h1 class="mt-4">Import File CSV</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Import File CSV</li>
                        </ol>
                       
                    
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Import File CSV
                            </div>
                            <div class="pull-right">
                </div>
                            <div class="card-body">
                                  <fieldset>
        <?php
            include('koneksi.php');
            $id = $_GET['id']; 
            $hal = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM pertemuan WHERE pertemuan_id='$id'"));
        ?>

        <?php
    
            if(isset($_POST['import'])){ //eksekusi jika ada submit csv
                error_reporting(0);
                $fileName = $_FILES["file"]["tmp_name"]; 
                if ($_FILES["file"]["size"] > 0) { 
                
                    $file = fopen($fileName, "r"); //membuka file
                    $row = 0; 
                    while (($column = fgetcsv($file, "10000")) !== FALSE) { //mendapatkan value dari kolom 

                        if($row>=7){ //jika baris lebih dari 7 baru akan dieksekusi

                            $n     = preg_split("/[0-9]/", mb_convert_encoding($column[0], 'UTF-8', 'UTF-16BE')); 

                            $nama   = trim($n[0]);
                            $exm = explode(" ",mb_convert_encoding($column[1], 'UTF-8', 'UTF-16BE')); 

                            $jam_masuk    = $exm[1];
                            
                            $exj = explode(" ",mb_convert_encoding($column[2], 'UTF-8', 'UTF-16BE')); 

                            $jam_keluar  = $exj[1];
                            
                            $jam = explode("h",mb_convert_encoding($column[2], 'UTF-8', 'UTF-16BE')); //mengambil data dari column ke-2 yang dipisahkan oleh h

                            $fjam = explode(" ",$jam[0]);
                            $cek = end($fjam);
                            $ffjam = explode("M", $fjam[2]);

                            $m = explode(" ",mb_convert_encoding($column[2], 'UTF-8', 'UTF-16BE')); 

                            $menit = explode("m", $m[3]);
                            $me = $menit[0];
                            $durasi = ((int)$ffjam[1]*60)+(int)$menit[0]; 
                            
                           

                            // mengambil id krs sesuai dengan nama mahasiswa
                            $query = mysqli_query($koneksi, "SELECT * FROM krs_peserta_kelas as krs INNER JOIN mahasiswa ON krs.mahasiswa_id=mahasiswa.mahasiswa_id WHERE mahasiswa.nama = '$nama'");
                            $r = mysqli_fetch_array($query);
                            $krs_id = $r['krs_id'];

                            echo $durasi;
                            //input data absensi
                            $result = mysqli_query($koneksi,"insert into absensi values ('','$krs_id','$id','$jam_masuk','$jam_keluar','$durasi')");

                            if (empty($result)){
                                $type = "error";
                                $message = "Gagal Mengupload";
                            }
                        }
                        $row++;
                    }
                    echo "<script>alert('Berhasil Mengupload');window.location.replace('detail-pertemuan.php?id=".$hal['pertemuan_id']."');</script>";       
                } else {
                    echo "<script>alert('Gagal Mengupload!');</script>";
                }
            
            }
        ?>
        <form method="post" enctype="multipart/form-data" action="">
            <div class="form-group">
                <label for="exampleInputFile">File Upload</label>
                <input type="file" name="file" class="form-control" accept=".csv" id="exampleInputFile">
            </div>
            <input type="submit" class="btn btn-primary" value="Import" name="import" />
        </form>
        </fieldset>


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
     <script type="text/javascript">
        $(document).ready(
        function() {
            $("#frmCSVImport").on(
            "submit",
            function() {

                $("#response").attr("class", "");
                $("#response").html("");
                var fileType = ".csv";
                var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+("
                        + fileType + ")$");
                if (!regex.test($("#file").val().toLowerCase())) {
                    $("#response").addClass("error");
                    $("#response").addClass("display-block");
                    $("#response").html(
                            "Invalid File. Upload : <b>" + fileType
                                    + "</b> Files.");
                    return false;
                }
                return true;
            });
        });
    </script>
</html>


