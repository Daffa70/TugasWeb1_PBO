<?php 
session_start();
include 'db.php';
$db = new DB();
 
$aksi = $_GET['aksi'];
 if($aksi == "tambah"){
    $nama_file    = $_FILES['foto']['name'];
    move_uploaded_file ($_FILES['foto']['tmp_name'], "foto/".$nama_file);

 	$db->tambahMahasiswa($_POST['nim'], $_POST['nama'], $_POST['jk'] , $_POST['alamat'], $_POST['kota'], $_POST['email'], $nama_file);
    $statusMsg = 'Data berhasil ditambah.';
    $_SESSION['statusMsg'] = $statusMsg;
 	header("location:index.php");
 }elseif($aksi == "hapus"){ 	
 	$db->hapusMahasiswa($_GET['id']);
    $statusMsg = 'Data berhasil dihapus.';
    $_SESSION['statusMsg'] = $statusMsg;
	header("location:index.php");
 }elseif($aksi == "update"){
    $nama_file    = $_FILES['foto']['name'];
    if (strlen($nama_file)>0) {
        //upload Photo
        if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
            move_uploaded_file ($_FILES['foto']['tmp_name'], "foto/".$nama_file);
        }
    }
    else{
        $nama_file = $_POST['foto_hidden'];
    }

 	$db->editMahasiswa($_POST['nim'], $_POST['nama'], $_POST['jk'] , $_POST['alamat'], $_POST['kota'], $_POST['email'], $nama_file, $_POST['id']);
    $statusMsg = 'Data berhasil diupdate.';
    $_SESSION['statusMsg'] = $statusMsg;
 	header("location:index.php");
 }
?>