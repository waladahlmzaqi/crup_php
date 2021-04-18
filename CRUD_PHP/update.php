<?php
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$id = $_POST['id'];
$nama_depan = $_POST['nama_depan'];
$nama_belakang = $_POST['nama_belakang'];
$no_hp = $_POST['no_hp'];
$gender = $_POST['gender'];
$jenjang = $_POST['jenjang'];
$hobi = $_POST['hobi'];
$alamat = $_POST['alamat'];
 
// update data ke database
mysqli_query($conn,"UPDATE students SET 
nama_depan='$nama_depan', 
nama_belakang='$nama_belakang', 
no_hp='$no_hp', 
gender='$gender',
jenjang='$jenjang',
hobi='$hobi',
alamat='$alamat' 
WHERE id='$id'");
 
// mengalihkan halaman kembali ke index.php
header("location:index.php");
?>