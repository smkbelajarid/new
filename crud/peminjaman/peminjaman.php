<?php 

session_start();

require '../functions/functions.php';

$buku = query("SELECT * FROM buku");

if(isset($_POST["submit"])){
    if(iPeminjam($_POST) > 0){
        echo "berhasil";
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
    <h1>halaman peminjaman buku</h1>
    <br>
    <a href="../logout.php">logout</a>

    <form action="" method="post">
        <label for="tanggal_pinjam">Tanggal_pinjam :</label>
        <input type="date" name="tanggal_pinjam" id="tanggal_pinjam">
        <br>
        <label for="tanggal_kembali">Tanggal_pengembalian :</label>
        <input type="date" name="tanggal_kembali" id="tanggal_kembali">
        <br>
        <label for="status_peminjaman">Status peminjaman :</label>
        <input type="text" name="status_peminjaman" id="status_peminjaman">
        <br>
        <label for="id_siswa">Nama Siswa :</label>
        <input type="hidden" name="id_siswa" id="id_siswa" value="<?php echo $_SESSION['id_siswa'] ?>">
        <input type="text" value="<?php echo $_SESSION['username']; ?>" disabled>
        <br>
        <label for="id_buku">Nama Buku :</label>
        <select name="id_buku" id="id_buku">
        <?php 
            $conn = mysqli_connect("localhost", "root", "", "crud");
            $sql = mysqli_query($conn, "SELECT * FROM buku");
            while($row = mysqli_fetch_array($sql)){
        ?>
                <option value="<?= $row["id_buku"]; ?>"><?= $row["nama"]; ?></option>
            <?php }?>
        </select>

        <br>
        <button type="submit" name="submit">kirim</button>
    </form>

</body>
</html>