<?php
include "koneksi.php";

$nama_file=$_FILES['gambar']['name'];
$ukuran_file=$_FILES['gambar']['size'];
$tipe_file=$_FILES['gambar']['type'];
$tmp_file=$_FILES['gambar']['tmp_name'];

$path="images/".$nama_file;

if($tipe_file=="image/jpeg"||$tipe_file=="image/png"){
    if($ukuran_file <=1000000){
        if(move_uploaded_file($tmp_file,$path)){
            $query="INSERT INTO gambar(nama,ukuran,tipe) VALUE('".$nama_file."','".$ukuran_file."','".$tipe_file."')";
            $sql=mysqli_query($connect,$query);
            if($sql){
                header("location: index.php");
            }else{
                echo"maaf, terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
                echo"<br><a href='form.php'>Kembali Ke Form</a>";
            }
            }else{
                echo"maaf, gambar gagal untuk diupload.";
                echo"<br><a href='form.php'>Kembali Ke Form</a>";
        }
    }else{
        echo"maaf, ukuran gambar yang diupload tidak boleh lebih dari 1MB";
        echo"<br><a href='form.php'>Kembali Ke Form</a>"
    }
    }else{
        echo"maaf, tipe gambar yang diupload harus JPG/JPEG/PNG.";
        echo"<br><a href='form.php'>Kembali Ke Form</a>";
    }
?>