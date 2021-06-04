<?php
	// ini proses login ya
	if(isset($_POST['login'])){
		include 'koneksi.php';
		$email = $_POST['email'];
		$password = $_POST['password'];

		$cek = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE email = '".$email."' AND password = '".$password."'");
		$data = mysqli_fetch_array($cek);
		$nama_pelogin = $data['nama'];
		$tipe_pelogin = $data['tipe'];

		if(mysqli_num_rows($cek) > 0){

			session_start();
			$_SESSION['nama'] = $nama_pelogin;
			$_SESSION['tipe'] = $tipe_pelogin;

			if($tipe_pelogin == '1'){
				header('location:lihat-kelas.php');

			}elseif($tipe_pelogin == '2'){
				header('location:daftar_kelas_mahasiswa.php');
			}
		}else{
			echo 'gagal masuk';
		}
	}
?>