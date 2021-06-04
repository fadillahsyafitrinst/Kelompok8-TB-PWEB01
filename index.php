<html lang="en">
    <head>
        <title>
            Kelas
        </title>


      <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
   
      <!--   <style>
            body {
                padding: 10px 30px 10px 10px;
            }
            table {
                border-collapse: collapse;
                float: left;
                width: 100%;
            }
            table tr th {
                background-color: rgb(144, 208, 84);
                color: black;
                padding: 10px;
            }
            table tr td {
                border: 1px solid black;
                padding: 10px;
            }
        </style> -->
    </head>
    <body>
         <div class="container">
            <h1 class="text-center">Daftar Kelas</h1>
        
            <a href="tambah_kelas.php" class="btn btn-primary">+ Tambah Kelas</a>
       <br>
         <table border="1" cellpadding="4">
            <br>
        <tr bgcolor="DodgerBlue"> 
            <tr>
                <th>No.</th>
                <th>Kode kelas</th>
                <th>Kode Matkul</th>
                <th>Nama Matkul</th>
                <th>Tahun</th>
                <th>Semester</th>
                <th>SKS</th>
                <th>Action</th>
            </tr>
<?php
	include "koneksi.php";
    $query = "SELECT * FROM Kelas";
    $hasil=mysqli_query($koneksi,$query);
    $no = 1;
    while($tampil=mysqli_fetch_array($hasil)){ 
?>
<tr>
                <td><?= $no++; ?></td>
                <td><?= $tampil['kode_kelas'];?></td>
                <td><?= $tampil['kode_makul'];?></td>
                <td><?= $tampil['nama_makul'];?></td>
                <td><?= $tampil['tahun'];?></td>
                <td><?= $tampil['semester'];?></td>
                <td><?= $tampil['sks'];?></td>
                <td>
                    <a href="edit.php?id=<?php echo $tampil['kelas_id']; ?>" class="btn btn-primary">Edit</a> |
                    <a href="lihat_detail_kelas.php?id=<?php echo $tampil['kelas_id']; ?>" class="btn btn-primary">Lihat Detail kelas</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>


    </body>
</html>