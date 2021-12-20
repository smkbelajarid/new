<?php 

// koneksi ke db
$conn = mysqli_connect("localhost","root","","crud");

$result = mysqli_query($conn,"SELECT * FROM buku");

function query($query){
    global $conn;

    $result = mysqli_query($conn,$query);

    $rows = [];

    while( $row = mysqli_fetch_assoc($result) ){
        $rows[] = $row;
    }
    return $rows;

}

function tambah($data){
    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $penulis = htmlspecialchars($data["penulis"]);
    $tahun = htmlspecialchars($data["tahun"]);


    $query = "INSERT INTO buku
    VALUES 
    ('','$nama','$penulis','$tahun')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

function hapus($id){
    global $conn;

    mysqli_query($conn,"DELETE FROM buku WHERE id_buku = $id");

    return mysqli_affected_rows($conn);

}

function edit($data){
    global $conn;

        $id = htmlspecialchars($data["id_buku"]);
        $nama = htmlspecialchars($data["nama"]);
        $penulis = htmlspecialchars($data["penulis"]);
        $tahun = htmlspecialchars($data["tahun"]);

    $query = "UPDATE buku SET nama = '$nama', penulis = '$penulis', tahun = '$tahun' WHERE id_buku = '$id' ";


    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function iPeminjam($data){
    global $conn;

    $tanggalP = htmlspecialchars($data["tanggal_pinjam"]);
    $tanggalK = htmlspecialchars($data["tanggal_kembali"]);
    $status = htmlspecialchars($data["status_peminjaman"]);
    $username = htmlspecialchars($data["id_siswa"]);
    $idBuku = htmlspecialchars($data["id_buku"]);

    $query = "INSERT INTO peminjaman
    VALUES 
    ('','$tanggalP','$tanggalK','$status','$username','$idBuku')";

    mysqli_query($conn, $query);
    
    return mysqli_affected_rows($conn);
    var_dump($query);
}

?>