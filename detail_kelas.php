
<!DOCTYPE html>
<html>
<head>
	<title>Detail Kelas</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body align="center" background="background.jpg" >
<div class="wrap">
		<div class="header">
	<h1>Detail Kelas</h1>
	</div>
<div class="badan">	
		<div class="content">

    <table border="1" bgcolor="#FFFFE0" align="center">
	<?php
    require 'koneksi.php';
    $sql     = "SELECT * FROM absensi WHERE krs_id='$krs_id'";
    $query   = mysqli_query($koneksi, $sql); 

    echo ' 
        			<tr>
						<td width=100px align=center>Pertemuan</td>
        				<td width=200px align=center>Jam Masuk</td>
						<td width=100px align=center>Jam Keluar</td>
						<td width=100px align=center>Durasi</td>

        			</tr>
    ';

    while ($form = mysqli_fetch_array($query)) {
            echo '
            	
                        <tr>
                            <td width=100px align=center>' . $form['pertemuan_id'] . '</td>
							<td width=200px align=center>' . $form['jam_masuk'] . '</td>
							<td width=100px align=center>' . $form['jam_keluar'] . '</td>
							<td width=100px align=center>' . $form['durasi'] . '</td>
                        </tr>
                    ';
    }
    ?>
		</table>
	</div>
</div>
</body>
</html>