<?php
include 'koneksi.php';


$krs_id = $_GET['krs_id'];
$kelas_id = $_GET['kelas_id'];
 
$delete = mysqli_query($koneksi,"DELETE FROM `krs_peserta_kelas` WHERE krs_id='$krs_id' AND kelas_id='$kelas_id'");


if ($delete) {
    echo "<script> alert ('Peserta berhasil dihapus') ; document.location.href='lihat_detail_kelas.php?id=$kelas_id'; </script>";
}
else {
    echo "<script> alert ('Peserta gagal dihapus') ; document.location.href='lihat_detail_kelas.php?id=$kelas_id';</script>"; 

}
 
?>