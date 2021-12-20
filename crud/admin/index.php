<?php 
require '../functions/functions.php';

$buku = query("SELECT * FROM buku");

if(empty($buku)){
    echo "data kosong";
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

<h1>halaman data buku</h1>
<a href="../logout.php">logout</a>
<br>

<a href="tambah.php">Tambah data buku</a>
<br><br>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <td>No</td>
        <td>Nama Buku</td>
        <td>Penulis</td>
        <td>Tahun</td>
        <td>Aksi</td>
    </tr>

    <?php 
    $i = 1; 
    foreach ($buku as $row) : ?>
        
    <tr>
        <td><?= $i; ?></td>
        <td><?= $row["nama"]; ?></td>
        <td><?= $row["penulis"]; ?></td>
        <td><?php echo date('Y', strtotime($row["tahun"])); ?></td>
        <td><a href="hapus.php?id_buku=<?= $row["id_buku"]; ?>">Hapus</a>  |  <a href="edit.php?id_buku=<?= $row["id_buku"]; ?>">Edit</a></td>
    </tr>   
    <?php $i++; ?> 
    <?php endforeach;?>

 
</table>


</body>
</html>