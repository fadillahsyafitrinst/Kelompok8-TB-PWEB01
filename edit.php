<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
            body {
                padding: 10px 30px 10px 10px;
            }
            table {
                border-collapse: collapse;
                float: left;
                width: 50%;
            }
            table tr td {
                padding: 10px;
            }
        </style>
</head>
<body>
	<?php
		include "koneksi.php";
		$kelas_id = $_GET['id'];
        $query = "SELECT * FROM kelas WHERE kelas_id='$kelas_id'";
        $hasil = mysqli_query($koneksi, $query);
        $tampil = mysqli_fetch_array($hasil);
	?>

	<form method="post" action="">
        <table >
            <tr>
            	<td>Kode Kelas</td>
                <td> : </td>
                <td>
                    <input type="text" name="kode_kelas" value="<?=$tampil['kode_kelas']; ?>" >
                </td>
            </tr>

            <tr>
            	<td>Kode Matkul</td>
                <td> : </td>
                <td>
                    <input type="text" name="kode_makul" value="<?=$tampil['kode_makul']; ?>" >
                </td>
            </tr>

            <tr>
            	<td>Nama Matkul</td>
                <td> : </td>
                <td>
                    <input type="text" name="nama_makul" value="<?=$tampil['nama_makul']; ?>" >
                </td>
            </tr>

           <tr>
            	<td>Tahun</td>
                <td> : </td>
                <td>
                    <input type="text" name="tahun" value="<?=$tampil['tahun']; ?>" >
                </td>
            </tr>

            <tr>
                <td>Semester</td>
                <td> :  </td>
                <td>
                    <input type="radio" name="semester" value="1"> 1 (Ganjil) <br>
                    <input type="radio" name="semester" value="2"> 2 (Genap) <br>
                </td>
            </tr>

            <tr>
                <td>SKS</td>
                <td> : </td>
                <td>
                    <input type="text" name="sks" value="<?=$tampil['sks']; ?>">
                </td>
            </tr>
                
                <tr>
                <td>
                    <br>
                    <a href="index.php"><input type="button" name="submit" id="submit" value="KEMBALI"></a>
                </td>
                <td>
                    <br>
                </td>
                <td>
                    <br>
                    <input type="submit" name="submit" id="submit" value="EDIT">
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
      	$submit = $_POST['submit'];
      
      if($submit){
        
        $query = "UPDATE kelas SET
			kode_kelas='$kode_kelas',
			kode_makul='$kode_makul',
			nama_makul='$nama_makul',
			tahun='$tahun',
            semester='$semester',
            sks='$sks'
			WHERE kelas_id=$kelas_id";

        $hasil      = mysqli_query($koneksi,$query) or die (mysqli_error($koneksi));

        if($hasil){
            echo "<script>alert('DATA BERHASIL DIUBAH');window.location.replace('index.php');</script>";
        }else{
            echo "<script>alert('DATA GAGAL DIUBAH');</script>";
        }
      }
        ?>

</body>
</html>