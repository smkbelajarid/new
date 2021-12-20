<?php 
require '../functions/functions.php';

$id = $_GET["id_buku"];

$buku = query("SELECT * FROM buku WHERE id_buku = $id")[0];

$conn = mysqli_connect("localhost","root","","crud");

if(isset($_POST["submit"])){
    if(edit($_POST) > 0){
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
    
<h1>Halaman edit data</h1>

<a href="index.php">Kembali ke halaman home</a><br><br>

<form action="" method="post">
<input type="hidden" name="id_buku" value="<?= $buku["id_buku"];?>">
    <label for="nama">Nama :</label>
    <input type="text" name="nama" id="nama" value="<?= $buku["nama"]; ?>" autocomplete="off">
    <br>
    <label for="penulis">penulis :</label>
    <input type="text" name="penulis" id="penulis" value="<?= $buku["penulis"]; ?>" autocomplete="off">
    <br>
    <label for="tahun">Tahun Tebit :</label>
    <input type="text" name="tahun" id="tahun" value="<?= $buku["tahun"]; ?>" autocomplete="off">
    <br>
    <button type="submit" name="submit">Kirim</button>
</form>

</body>
</html>