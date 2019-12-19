<?php

include "koneksi.php";

$namaBuah = $_POST['nama_buah'];
$jenisBuah = $_POST['jenis_buah'];
$stokBuah = $_POST['stock_buah'];
$hargaBuha = $_POST['harga_buah'];

$tmpName = $_FILES['foto']['tmp_name'];
$folder = "gambar/".$_FILES['foto']['name'];
$size = $_FILES['foto']['size'];
$upload = move_uploaded_file($tmpName, $folder);

if($size <= 1048576){
    mysqli_query($koneksi, $simpan);
    echo "<script language='JavaScript'>
    alert('Buah berhasil di tambah!')
    document.location='home.php'
    </script>";
}else{
    // echo "LAPOR! ada Error di ".mysqli_error($koneksi);
    echo "File Maksimal 1MB";
}

$simpan = "INSERT INTO tb_buah (nama_buah,jenis_buah,stock_buah,harga_buah,foto,id) VALUES ('$namaBuah','$jenisBuah','$stokBuah','$hargaBuha','$folder','$id')";


if (mysqli_query($koneksi, $simpan)){
    echo "Data berhasil ditambahkan";
    header("location:home.php");
}else{
    echo"Lapor! ada error di " . mysqli_error($koneksi);
}
