<?php 
require '../functions/functions.php';

if(isset($_POST["submit"])){
    if(tambah($_POST) > 0){
        echo "berhasil";
        header("location:index.php");
    } else {
        echo "gagal";
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<h1>Halaman tambah data</h1>

<a href="index.php">Kembali ke halaman home</a><br><br>

<form action="" method="post">
    <label for="nama">Nama :</label>
    <input type="text" name="nama" id="nama" autocomplete="off">
    <br>
    <label for="penulis">Penulis :</label>
    <input type="text" name="penulis" id="penulis" autocomplete="off">
    <br>
    <label for="tahun">Tahun :</label>
    <input type="date" name="tahun" id="tahun">
    <br>
    <button type="submit" name="submit">Kirim</button>
</form>

</body>
</html>