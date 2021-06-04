<?php
if (!isset($_SESSION)) {
	session_start();
	if (!isset($_SESSION["id"]) && !isset($_SESSION["nim"]) && !isset($_SESSION["nama"]) && !isset($_SESSION["tipe"]) && $_SESSION["tipe"] != 2) {
		
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Daftar Kelas</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body align="center" background="background.jpg" >
<div class="wrap">
		<div class="header">
	<h1>Daftar Kelas</h1>
	</div>
<div class="badan">	
		<div class="content">

    <table border="1" bgcolor="#FFFFE0" align="center">
	<?php
	
    include 'koneksi.php';
	$id = $_GET['id'];
  
    $sql     = "SELECT * FROM krs JOIN kelas USING(kelas_id) WHERE mahasiswa_id='$id'";
    $query   = mysqli_query($koneksi, $sql); 

    echo ' 
        			<tr>
						<td width=100px align=center>Kode Kelas</td>
        				<td width=200px align=center>Kode Mata Kuliah</td>
						<td width=100px align=center>Mata Kuliah</td>
						<td width=100px align=center>Tahun Ajaran</td>
						<td width=100px align=center>Semester</td>
						<td width=100px align=center>SKS</td>
						<td width=150px align=center>Detail Kelas</td>
        			</tr>
    ';

    while ($form = mysqli_fetch_array($query)) {
            echo '
            	
                        <tr>
                            <td width=100px align=center>' . $form['kode_kelas'] . '</td>
							<td width=200px align=center>' . $form['kode_matkul'] . '</td>
							<td width=100px align=center>' . $form['nama_matkul'] . '</td>
							<td width=100px align=center>' . $form['tahun'] . '</td>
							<td width=100px align=center>' . $form['semester'] . '</td>
							<td width=100px align=center>' . $form['sks'] . '</td>

                            <td width=150px align=center>
                                <a href="detail_kelas.php?kelas_id=' . $form['kelas_id'] . '"> Detail Kelas</a>
                            </td>
                        </tr>
                    ';
    }
    ?>
		</table>
	</div>
</div>
</body>
</html>